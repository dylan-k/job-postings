# job-postings
a simple plugin for wordpress so you can add jobs listings to your website. creates a custom post type.

List of Jobs
------------

```php

/* Template Name: Jobs Archive */
/* Lists all the posts with the Jobs posttype
   Save in a theme file named page-jobs.php
*/

<?php // Output all Taxonomies names with their respective items
$terms = get_terms('jobtype', 'orderby=count&order=DESC');
foreach( $terms as $term ):
?>                          
    <h3 id="<?php echo $term->slug; ?>">
      <?php echo $term->name; // Print the term name ?></h3>
    <?php echo $term->description; // Print the term name ?>                          
    <ul>
      <?php                         
          $posts = get_posts(array(
            'post_type' => 'job',
            'taxonomy' => $term->taxonomy,
            'term' => $term->slug,                                  
            'nopaging' => true, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
          ));
          foreach($posts as $post): // begin cycle through posts of this taxonmy
            setup_postdata($post); //set up post data for use in the loop (enables the_title(), etc without specifying a post ID)
      ?>        
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>    
        <?php endforeach; ?>
    </ul>                                                   
<?php endforeach; ?>

```

job post
--------


```php

/**
* Job Details Page
*
* Displays a post with the "Jobs" type
* Include in a theme file named  single-job.php
*
* @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
*/


<h1 class="page_title" id="page_title"><?php the_title(); ?></h1>

<?php the_content(); ?>

<?php if( has_term('internship', 'jobtype') ):  ?>
<!-- this is an internship -->
<p><small>We offer opportunities for qualified undergraduate and graduate candidates to intern in various museum divisions throughout the year...</small></p>


<?php endif; ?>

<?php if( has_term('full-time', 'jobtype') ):  ?>
<!-- this is a full-time position -->
<p>Job Type: Full-time</p>
<?php endif; ?>

<?php // if( has_term('full-time', 'jobtype') || has_term('part-time', 'jobtype') || has_term('fellowship', 'jobtype')  ):  ?>
<?php if( has_term('full-time', 'jobtype')):  ?>
<!-- this is any paid position -->
<p>This is a full-time position...</p>
<?php endif; ?>


<!-- button goes here -->
<!-- url: 
<a href="https://example.org/jobs/apply/?pos=<?php echo base64_encode(get_the_title()); ?>&mgr=<?php echo base64_encode(get_field('jobs_manager')); ?>">APPLY</a>
-->

<?php if( has_term('volunteer', 'jobtype') ):  ?>
  <a class="button event_detail_button" href="https://thewalters.org/about/resources/jobs/volunteer-application/?pos=<?php echo base64_encode(get_the_title()); ?>&mgr=<?php echo base64_encode(get_field('jobs_manager')); ?>">APPLY</a>
<?php endif; ?>
              
```




jobs metadata
------------


```js
/*
* JobPosting Schema Metadata
* This displays structured data within a job posting.
@link https://schema.org/JobPosting
*/

<script type="application/ld+json">
  {  
    "@context":"http://schema.org",
    "@type":"JobPosting",
    "datePosted":"<?php the_time( 'c' ); ?>",
    "validThrough":"<?php echo get_post_meta($post->ID, 'xn-wppe-expiration', true); ?>",
    "description":"<?php wp_json_encode(the_content_rss()); ?>",
    "industry":"Museum",
    "employmentType":"<?php echo strip_tags(get_the_term_list( $post->ID, 'jobtype', '',', ')); ?>",
    "jobLocation":{  
      "@type":"Place",
      "address":{  
        "@type":"PostalAddress",
        "streetAddress":"123 Main Street",
        "addressLocality":"Anytown",
        "addressRegion":"MD",
        "postalCode":"90210"
      }
    },
    "title":"<?php the_title(); ?>",
    "hiringOrganization":{  
      "@type":"Organization",
      "name":"The Example Company",
      "url":"http://example.org",
      "logo":{  
        "@type":"imageObject",
        "url":"http://example.org/logo.png"
      }
    }
  }
</script>
```

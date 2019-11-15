# job-postings
a simple plugin for wordpress so you can add jobs listings to your website. creates a custom post type.



```html
/*
  * JobPosting Schema Metadata
  * This displays structured data about a job posting.
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

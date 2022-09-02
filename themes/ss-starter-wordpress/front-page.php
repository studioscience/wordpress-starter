<?php
/**
 * The template for displaying the front page
 */

get_header();

/* Start the Loop */
while (have_posts()): 

$components = get_field('components');
$manifesto = $components['manifesto']; // pass this (acf manfiesto component fields) into the manifesto template part

?>
  <div class="font-abc-social-light">Font Test ABC Social Light</div>
  <div class="font-abc-social-regular">Font Test ABC Social Regular</div>
  <div class="font-abc-social-bold">Font Test ABC Social Bold</div>
  <br />
  <div class="font-abc-social-mono-light">Font Test ABC Social Mono Light</div>
  <div class="font-abc-social-mono-regular">Font Test ABC Social Mono Regular
  </div>
  <div class="font-abc-social-mono-bold">Font Test ABC Social Mono Bold</div>
  <br />
  <div class="font-clearface-regular">Clearface Regular</div>
  <div class="font-clearface-bold">Clearface Bold</div>

  <div class="typography-demo">
    <pre>h1</pre>
    <h1>We demand a present and future where Black people, Black spaces, & Black culture matter & thrive.</h1>

    <pre>h1 .serif</pre>
    <h1 class="serif">We demand a present and future where Black people, Black spaces, & Black culture matter & thrive.</h1>

    <pre>h2</pre>
    <h2>We operate under a set of intentional work areas to co-create meaningful spaces that affirm and amplify Black presence in public life.</h2>

    <pre>h2 .serif</pre>
    <h2 class="serif">We operate under a set of intentional work areas to co-create meaningful spaces that affirm and amplify Black presence in public life.</h2>

    <pre>h3</pre>
    <h3>Neighborhood Strategy</h3>

    <pre>h3 .serif</pre>
    <h3 class="serif">Neighborhood Strategy</h3>

    <pre>label</pre>
    <label>Discover More</label>

    <pre>body</pre>
    <p>We collaborate with historically Black neighborhoods to create projects that reflect the community’s vision.</p>

    <pre>eyebrow</pre>
    <label class="eyebrow">Press</label>

  </div>

  <div style="width: 100%; padding-left: 100px;">
    <?php get_template_part(
      "template-parts/manifesto/manifesto-list/manifesto-list"
    ); ?>
    <?php get_template_part(
      "template-parts/manifesto/manifesto-ticker/manifesto-ticker"
    ); ?>
  </div>

  <br />
  <div>
    <h3>Icon Zone</h3>
    <div>
      <?php get_icon("external-link"); ?>
      <?php get_icon("external-link", ["size" => "small"]); ?>
    </div>

    <div>
      <?php get_icon("arrow"); ?>
      <?php get_icon("arrow", ["size" => "small"]); ?>
    </div>

    <div>
      <?php get_icon("instagram"); ?>
      <?php get_icon("instagram", ["size" => "small"]); ?>
    </div>

    <div>
      <?php get_icon("facebook"); ?>
      <?php get_icon("facebook", ["size" => "small"]); ?>
    </div>

    <div>
      <?php get_icon("twitter"); ?>
      <?php get_icon("twitter", ["size" => "small"]); ?>
    </div>
  </div>

  <div style="padding: 20px; background: black;">
    <h3 style="color: white;">Button Bayou</h3>

    <h4 style="color: white; margin-top: 20px;">Primary</h4>
    <?php get_button("button", [
      "variant" => "primary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "icon" => [
        "icon" => "facebook",
      ],
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
    ]); ?>

    <?php get_button("anchor", [
      "variant" => "primary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "href" => "https://example.com",
      "icon" => [
        "icon" => "external-link",
      ],
      "target" => "_blank",
      "ariaLabel" => "sample button using anchor tag",
    ]); ?>

    <?php get_button("disabled button", [
      "variant" => "primary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "icon" => [
        "icon" => "facebook",
      ],
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
      "disabled" => true,
    ]); ?>

    <?php get_button("disabled anchor", [
      "variant" => "primary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "href" => "https://example.com",
      "icon" => [
        "icon" => "facebook",
      ],
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
      "disabled" => true,
    ]); ?>

    <h4 style="color: white; margin-top: 20px;">Secondary</h4>
    <?php get_button("button", [
      "variant" => "secondary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "icon" => [
        "icon" => "facebook",
      ],
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
    ]); ?>

    <?php get_button("anchor", [
      "variant" => "secondary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "href" => "https://example.com",
      "icon" => [
        "icon" => "external-link",
      ],
      "target" => "_blank",
      "ariaLabel" => "sample button using anchor tag",
    ]); ?>

    <?php get_button("disabled button", [
      "variant" => "secondary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "icon" => [
        "icon" => "facebook",
      ],
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
      "disabled" => true,
    ]); ?>

    <?php get_button("disabled anchor", [
      "variant" => "secondary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "href" => "https://example.com",
      "icon" => [
        "icon" => "external-link",
      ],
      "target" => "_blank",
      "ariaLabel" => "sample button using anchor tag",
      "onclick" => "alert('you got me!')",
      "disabled" => true,
    ]); ?>

    <h4 style="color: white; margin-top: 20px;">Tertiary</h4>
    <?php get_button("button", [
      "variant" => "tertiary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "icon" => [
        "icon" => "facebook",
      ],
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
    ]); ?>

    <?php get_button("anchor", [
      "variant" => "tertiary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "href" => "https://example.com",
      "icon" => [
        "icon" => "external-link",
      ],
      "target" => "_blank",
      "ariaLabel" => "sample button using anchor tag",
    ]); ?>

    <?php get_button("disabled button", [
      "variant" => "tertiary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "icon" => [
        "icon" => "facebook",
      ],
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
      "disabled" => true,
    ]); ?>

    <?php get_button("disabled anchor", [
      "variant" => "tertiary",
      "size" => "small",
      "className" => "front-page special-sauce",
      "href" => "https://example.com",
      "icon" => [
        "icon" => "external-link",
      ],
      "target" => "_blank",
      "ariaLabel" => "sample button using anchor tag",
      "onclick" => "alert('you got me!')",
      "disabled" => true,
    ]); ?>

    <h4 style="color: white; margin-top: 20px;">Text</h4>
    <?php get_button("button", [
      "variant" => "text",
      "size" => "small",
      "className" => "front-page special-sauce",
      "icon" => [
        "icon" => "facebook",
      ],
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
    ]); ?>

    <?php get_button("anchor", [
      "variant" => "text",
      "size" => "small",
      "className" => "front-page special-sauce",
      "href" => "https://example.com",
      "icon" => [
        "icon" => "external-link",
      ],
      "target" => "_blank",
      "ariaLabel" => "sample button using anchor tag",
    ]); ?>

    <?php get_button("disabled button", [
      "variant" => "text",
      "size" => "small",
      "className" => "front-page special-sauce",
      "icon" => "facebook",
      "onclick" => "alert('you got me!')",
      "ariaLabel" => "sample button, actual button",
      "disabled" => true,
    ]); ?>

    <?php get_button("disabled anchor", [
      "variant" => "text",
      "size" => "small",
      "className" => "front-page special-sauce",
      "href" => "https://example.com",
      "icon" => "external-link",
      "target" => "_blank",
      "aria_label" => "sample anchor, testing snake case",
      "onclick" => "alert('you got me!')",
      "disabled" => true,
    ]); ?>
  </div>

  <h3>Vertical Spacers</h3>
  <span>I'm a component (no hr, not-full-width below)</span>
  <?php get_vertical_spacing(["full_width" => false]); ?>
  <span>I'm another component (hr, full-width, smaller v-spacing below)</span>
  <?php get_vertical_spacing(["hr" => true, "size" => "s"]); ?>
  <span>I'm a third component (hr, not-full-width, large v-spacing below)</span>
  <?php get_vertical_spacing([
    "hr" => true,
    "size" => "l",
    "full_width" => false,
  ]); ?>

    <?php the_post(); ?>
    <?php get_template_part("template-parts/content/content-page"); ?>

    <br/>
    <div>
      <h3>Image Zone</h3>
      <div style="margin-top:2000px;">

        <!-- image -->
        <?php get_img(8, "thumbnail"); ?>
        <?php get_img(8, "medium"); ?>
        <?php get_img(8, "large"); ?>

      </div>
    </div>
<?php endwhile;
get_footer(); ?>

<?php
    $block_id = uniqid("gallery_");
    $imgurl = get_template_directory_uri() . '/assets/dist/images/';
?>
<div id="<?php echo $block_id ?>" class="gallery-main-wrapper relative">
<div class="page-controls flex w-full absolute bottom-[48%] justify-between">
<a href="" class="page-left" ><div class="h-10 w-10 p-2.5 md:p-5 md:h-[60px] md:w-[60px] text-center bg-white"><img class="w-full h-full" src="<?php echo $imgurl . 'left_arrow.svg'; ?>" alt="Go back one image"/></div></a>
<a href="" class="page-right" ><div class="h-10 w-10 p-2.5 md:p-5 md:h-[60px] md:w-[60px] text-center bg-white"><img class="w-full h-full" src="<?php echo $imgurl . 'right_arrow.svg'; ?>" alt="Go back one image"/></div></a>
</div>
<div class="gallery-images-wrapper">
<?php
    if( have_rows('image-gallery') ):
        $thumbs = array();
        // Loop through rows.
        while( have_rows('image-gallery') ) : the_row();

        // Load sub field value.
        $caption = get_sub_field('caption');
        $image = get_sub_field('image');
?>
<div class="page-wrapper page-sliderfade flex flex-1 flex-col">
    <div class="image-wrapper w-full max-h-[412px] md:max-h-[1000px] text-center items-center justify-center">
        <img class="w-full max-h-[412px] md:max-h-[1000px]" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $caption != "" ? $caption : esc_attr($image['alt']) ?>" />
    </div>
    <div class="image-caption flex justify-self-end w-full h-5 md:h-10"><span><?php echo $caption ?></span></div>
</div>
<?php
        $thumbs[] = $image['sizes'][ 'thumbnail' ];
        // End loop.
        endwhile;
?>
</div>
<div class="gallery-thumbs-wrapper flex flex-row justify-between mt-2.5 md:mt-5">
    <?php
        $counter = 1;
        foreach($thumbs as $thumb) :
    ?>
        <a id="<?php echo $block_id.'-'.$counter ?> " class="thumb-link" href="#">
        <img class="h-10 w-10 md:h-20 md:w-20" src="<?php echo esc_url($thumb) ?>" alt="Thumbnail for Image <?php echo $counter ?>" />
        </a>
    <?php
        $counter++;
        endforeach;
    ?>
</div>
</div>
<?php endif ?>
<script>
    var pageIndexes;
    jQuery(document).ready(()=>{
        let block_id = '#<?php echo $block_id ?>';
        console.log("Block ID", block_id);
        console.log("JQuery Block", jQuery(block_id));

        if(pageIndexes instanceof Object){
            pageIndexes[block_id] = 0;
        } else {
            pageIndexes = {};
            pageIndexes[block_id] = 0;
        }

        //Hide All Pages
        let pages = jQuery(`${block_id} .page-wrapper`);
        jQuery(pages).addClass("hidden");
        jQuery(pages[0]).removeClass("hidden");

        let thumbs = jQuery(`${block_id} .thumb-link`);
        jQuery(thumbs[0]).addClass("active-page");

        console.log(pages);
        console.log(pageIndexes);
        console.log(thumbs);

        jQuery(`${block_id} .page-right`).on("click", (e) => {
            console.log("Page Right Clicked", e);
            let index = pageIndexes[block_id];
            jQuery(pages[index]).addClass("hidden");
            jQuery(thumbs[index]).removeClass("active-page");

            index++;
            if(index >= pages.length){
                index = 0;
            }

            jQuery(pages[index]).removeClass("hidden");
            jQuery(thumbs[index]).addClass("active-page");
            pageIndexes[block_id] = index;
            e.preventDefault();
            return false;
        });
        jQuery(`${block_id} .page-left`).on("click", (e) => {
            console.log("Page Left Clicked", e);
            let index = pageIndexes[block_id];
            jQuery(pages[index]).addClass("hidden");
            jQuery(thumbs[index]).removeClass("active-page");
            index--;
            if(index < 0){
                index = pages.length - 1;
            }
            jQuery(pages[index]).removeClass("hidden");
            jQuery(thumbs[index]).addClass("active-page");
            pageIndexes[block_id] = index;
            e.preventDefault();
            return false;
        });
        jQuery(thumbs).on("click", (e) =>{ 
            console.log("Thumbnail Clicked", e);
            let id = jQuery(e.currentTarget).attr('id');
            let index = parseInt(id.replace(`${block_id.substring(1)}-`, "")) - 1;
            let curIndex = pageIndexes[block_id];

            if(index != curIndex){
                jQuery(pages[curIndex]).addClass("hidden");
                jQuery(thumbs[curIndex]).removeClass("active-page");
                jQuery(pages[index]).removeClass("hidden");
                jQuery(thumbs[index]).addClass("active-page");
                pageIndexes[block_id] = index;
            }

            e.preventDefault();
            return false;
        })
    });
</script>

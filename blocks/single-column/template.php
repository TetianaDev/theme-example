<?php
/**
 * Block Name: Single Column Block
 *
 * Description: Displays single column block.
 */

// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
?>

<!-- Our front-end template -->
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
    <div class="container">
        <div class="row"> 
            <div class="col-12">
                
            </div>
        </div>
    </div>
</section>

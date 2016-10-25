<?php if (in_array(strtolower($file->extension),['txt','html','htm'])): ?>
    <i class="fa fa-5x fa-file-text-o"></i>
<?php elseif (in_array(strtolower($file->extension),['png','jpg','jpeg','tiff']) ): ?>
    <img src="<?=$file->previewUrl()?>" />
<?php elseif (in_array(strtolower($file->extension),['bmp']) ): ?>
    <i class="fa fa-5x fa-file-image-o"></i>
<?php elseif (in_array(strtolower($file->extension),['pdf']) ): ?>
    <i class="fa fa-5x fa-file-pdf-o"></i>
<?php elseif (in_array(strtolower($file->extension),['doc', 'docx']) ): ?>
    <i class="fa fa-5x fa-file-word-o"></i>
<?php elseif (in_array(strtolower($file->extension),['xls', 'xlsx']) ): ?>
    <i class="fa fa-5x fa-file-excel-o"></i>
<?php endif; ?>

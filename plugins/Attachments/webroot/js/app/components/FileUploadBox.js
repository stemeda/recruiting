/* global App, Frontend, URL */

App.Components.FileUploadBoxComponent = Frontend.Component.extend({
    startup: function () {

        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        if ($('.panel-documents').length > 0) {console.log('asdf');
            this.createFileUploadBox();
        }
    },
    createFileUploadBox: function () {
        $fileBox = $('.panel-documents');
        $fileBox.find('.btn-file :file').on('fileselect', function (event, numFiles, label) {
            if (numFiles === 0) {
                $fileBox.find('.new-documents-title').hide();
                $fileBox.find('.new-documents-list').hide();
            } else {
                $fileBox.find('.new-documents-title').show();
                $fileBox.find('.new-documents-list').show();
                for (var i = 0; i < numFiles; i++) {
                    console.log(event.target.files[i]);
                    $fileBox.find('.new-documents-list').append(
                            this.createPreviewListElement(
                                    URL.createObjectURL(event.target.files[i]),
                                    event.target.files[i].name,
                                    event.target.files[i].size,
                                    event.target.files[i].lastModifiedDate
                                    )
                            );
                }
            }

        }.bind(this));
    },
    createPreviewListElement: function (url, fileName, fileSize, fileLastModifiedDate) {
        console.log(url, fileName);
        var ext = this.getExtensionOfFileName(fileName),
                $li = $('<li><div class="row"><div class="col-md-6"></div><div class="col-md-6"></div></div></li>');
        switch (ext.toLowerCase()) {
            case 'txt':
            case 'csv':
            case 'html':
            case 'htm':
                $li.find('.col-md-6').first().html('<iframe class="preview img-responsive" src="' + url + '">');
                break;
            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'gif':
            case 'tiff':
            case 'bmp':
            case 'svg':
                $li.find('.col-md-6').first().html('<img class="preview img-responsive" src="' + url + '">');
                break;
            default:
                $li.find('.col-md-6').first().html('Keine Vorschau vorhanden!');
                break;
        }
        $li.find('.col-md-6:eq(1)').html('<dl class="dl-horizontal"><dt>filename</dt><dd>' + fileName + '</dd></dl>');
        $li.addClass('list-group-item  alert alert-danger');
        return $li;

    },
    getExtensionOfFileName: function (fileName) {
        var re = /(?:\.([^.]+))?$/;
        return re.exec(fileName)[1];
    }
});

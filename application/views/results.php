<div class="row">
    <div class="col-sm-8">
        <h6 class="fw-bold">Image :</h6>
        <div class="text-center">
            <img src="<?= base_url('uploads/' . $uploadCaptcha['file_name']); ?> " alt="Captcha" class="img-fluid">
            <hr>
        </div>
        <h6 class="fw-bold">Result :</h6>
        <div class="text-center">
            <h1><?= $tesseract; ?></h1>
        </div>
    </div>
    <div class="col-sm-4">
        <form action="<?= base_url('ocr'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="recent" id="recent" value="<?= $uploadCaptcha['file_name']; ?>">
            <div class="mb-3">
                <label for="psm" class="form-label">Page Segmentation Modes (PSM):</label>
                <select class="form-select" aria-label="PSM" name="psm" id="psm" required>
                    <option selected value="">-- Select Page Segmentation Modes --</option>
                    <option value="0">Orientation and script detection (OSD) only.</option>
                    <option value="1">Automatic page segmentation with OSD.</option>
                    <option value="2">Automatic page segmentation, but no OSD, or OCR.</option>
                    <option value="3">Fully automatic page segmentation, but no OSD.</option>
                    <option value="4">Assume a single column of text of variable sizes.</option>
                    <option value="5">Assume a single uniform block of vertically aligned text.</option>
                    <option value="6">Assume a single uniform block of text.</option>
                    <option value="7">Treat the image as a single text line.</option>
                    <option value="8">Treat the image as a single word.</option>
                    <option value="9">Treat the image as a single word in a circle.</option>
                    <option value="10">Treat the image as a single character.</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="captchaInput" class="form-label">File input Captcha</label> <input class="form-control" type="file" name="captchaInput" id="captchaInput">
            </div>
            <div class="text-end ">
                <button class="btn btn-primary"> <i class="bi bi-cloud-upload"></i> Upload Captcha</button>
            </div>
        </form>

    </div>
</div>
<hr>
<p class="text-center">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
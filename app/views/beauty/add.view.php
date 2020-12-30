<div class="row">

    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <form action="<?= path("beauty/add"); ?>" method="POST">
            <input class="form-control" name="id" type="hidden" id="id">

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Service Name: </label>
                <div class="col-sm-10">
                    <input class="form-control" name="name" type="text" id="name">
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price: </label>
                <div class="col-sm-10">
                    <input class="form-control" name="price" type="number" step="0.01" id="price">
                </div>
            </div>

            <div class="form-group row">
                <label for="currency" class="col-sm-2 col-form-label">Currency: </label>
                <div class="col-sm-10">
                    <select class="form-control" name="currency" id="currency">
                        <option value="LE">جنيه مصري</option>
                        <option value="DL">دولار امريكي</option>
                        <option value="RS">ريال سعودي</option>
                        <option value="EU">يورو أوروبي</option>
                    </select>
                </div>
            </div>


            <div class="mb-5">
                                            <form action="#" class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                            </form>
                                        </div>

            <div class="form-group row">
                <div class="offset-md-2">
                    <input type="submit" class="btn btn-success waves-effect waves-light" value="Submit">
                </div>
            </div>
        </form>
    </div>

</div>
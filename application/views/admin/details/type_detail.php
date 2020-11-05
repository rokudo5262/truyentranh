<div class="container-fluid">
    <!-- Page Heading -->
    <?php foreach ($type as $type) : ?>
        <form action="<?php echo base_url(); ?>admin/handle_type" class="user" method="post" enctype="multipart/form-data">
            <h1 class="h3 mb-2 text-gray-800">Type <?php echo $type['id_type']; ?> Detail</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="card-title">
                        <a type="button" href="<?php echo base_url(); ?>admin/types" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-auto col-md-auto col-sm-12 col-xs-12">
                            <div class="form-group">
                                <img class="rounded" width="200" height="150" src="<?php echo base_url(); ?>asset/images/type/<?php echo $type['image_type'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-7 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $type['id_type']; ?>">
                                <input type="hidden" class="form-control" id="deleted" name="deleted" value="<?php echo $type['deleted']; ?>">
                                <input type="text" class="form-control" id="image" name="image" value="<?php echo $type['image_type']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Type Name</label>
                                <input type="text" class="form-control" id="type" name="type" value="<?php echo $type['name_type']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Type Discription</label>
                                <textarea class="form-control" id="description" name="description" contenteditable><?php echo $type['description_type']; ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Created Date</label>
                                        <input type="text" class="form-control" readonly id="created_datetime" name="created_datetime" value="<?php echo $type['created_datetime']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Updated Date</label>
                                        <input type="text" class="form-control" readonly id="updated_datetime" name="updated_datetime" value="<?php echo $type['updated_datetime']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" value="update" name="action" class="btn btn-success float-right btn-sm">Update</button>
                    <button type="submit" value="delete" name="action" class="btn btn-danger float-right btn-sm">Delete</button>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
</div>
<Script>
    var textarea = document.querySelector('textarea');
    textarea.addEventListener('change', autosize);
    textarea.addEventListener('keydown', autosize);

    function autosize() {
        var el = this;
        setTimeout(function() {
            el.style.cssText = 'width:auto;';
            el.style.cssText = 'height:auto;';
            el.style.cssText = 'resize: vertical;';
            el.style.cssText = 'resize: horizontal;';
            el.style.cssText = 'padding:5;';
            el.style.cssText = 'overflow:auto;';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        }, 0);
    }
</Script>
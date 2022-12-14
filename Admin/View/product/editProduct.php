<?php
  if (isset($_GET['act'])) {
    if ($_GET['act'] == 'insert') {
      $ac = "insert";
    } elseif ($_GET['act'] == 'update') {
      $ac = "update";
    } else {
      $ac = null;
    }
  }
  
  echo "Kiem tra". empty(0);
  
  if (isset($_GET['id']) && $_GET['id'] !== '') {
    $product_id = $_GET['id'];
    $product = new Product();
    $results = $product-> getDetailProducts($product_id);
    $product_name = $results['product_name'];
    $product_description = $results['product_description'];
    $product_thumbnail = $results['product_thumbnail'];
    $product_gallery = $results['product_gallery'];
    $product_price = $results['product_price'];
    $product_unit_id = $results['product_unit_id'];
    $product_inventory = $results['product_inventory'];
    $product_category_id = $results['product_category_id'];
    $product_trademark_id = $results['product_trademark_id'];
    // $product_source = $results['product_source'];
  }
?>
<div class="layout-page">
  <div class="content-wrapper">
    <div class="container-xxl container-p-y">
    
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <?php
        if ($ac == 'insert') {
          echo 'Thêm mới sản phẩm';
        } elseif ($ac == 'update') {  
          echo 'Cập nhật sản phẩm';
        }
      ?>
    </h4>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Sản phẩm</h5>
          <div id="message"></div>
          <hr class="my-0" />
          <div class="card-body">
            <form id="form">
              <input type="hidden" name="action" value="<?php echo $ac ?>">
              <input type="hidden" name="product_id" value="<?php if (isset($product_id)) {
                            echo $product_id;
                          } ?>">
              <div class="row">
                <div class="col-md-8">
                  <div class="mb-6 col-md-12">
                    <label for="product_name" class="form-label">Tên sản phẩm</label>
                    <input
                      class="form-control"
                      type="text"
                      id="product_name"
                      name="product_name"
                      value="<?php if (isset($product_id)) {
                        echo $product_name;
                      } ?>"
                      autofocus
                    />
                    <p id="product_name_err" class="text-danger"></p>
                  </div>
                  <div class="mb-6 col-md-12 my-3">
                    <label for="product_description" class="form-label">Mô tả sản phẩm</label>
                    <textarea name="product_description" id="product_description"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12 mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="product_inventory" class="form-label">Số lượng tồn kho</label>
                        <input
                          class="form-control"
                          type="number"
                          id="product_inventory"
                          name="product_inventory"
                          value="<?php if (isset($product_id)) {
                            echo $product_inventory;
                          } ?>"
                        />
                        <p class="text-danger" id="product_inventory_err"></p>
                      </div>
                      <div class="col-md-6">
                        <input type="hidden" name="product_unit_id" value="<?php echo (isset($product_unit_id) ? $product_unit_id : '') ?>">
                        <label for="product_unit_id" class="form-label">Đơn vị sản phẩm</label>
                        <select id="product_unit_id" class="select2 form-select" name="product_unit_id">
                          <option disabled selected>Lựa chọn đơn vị</option>
                          <?php 
                            $unit = new Unit();
                            $results = $unit->getListUnit(); 
                            while($set = $results->fetch()):
                          ?>
                            <option 
                              value="<?php echo $set['unit_id'] ?>"
                              <?php if (isset($product_unit_id)) {
                                echo (($product_unit_id==$set['unit_id']) ? "selected" : "");
                              } ?>
                            >
                              <?php echo $set['unit_name'] ?>
                            </option>
                          <?php endwhile; ?>
                        </select>
                        <p class="text-danger" id="product_unit_id_err"></p>
                      </div>
                    </div>
                  </div>
                  <div class="mb-6 col-md-12 mb-3">
                    <label for="product_price" class="form-label">Giá sản phẩm (VNĐ)</label>
                    <input
                      class="form-control"
                      type="number"
                      id="product_price"
                      name="product_price"
                      min = "0"
                      value="<?php if (isset($product_id)) {
                        echo $product_price;
                      } ?>"
                    />
                    <p class="text-danger" id="product_price_err"></p>
                  </div>
                  <div class="col-md-12">
                    <input type="hidden" name="product_category_id" value="<?php echo (isset($product_category_id) ? $product_category_id : '') ?>">
                    <label for="product_category_id" class="form-label">Danh mục sản phẩm</label>
                    <select id="product_category_id" class="select2 form-select" name="product_category_id">
                      <option disabled selected>Lựa chọn danh mục</option>
                      <?php 
                        $categogy = new Category();
                        $results = $categogy->getListCategory();
                        while($set = $results->fetch()):
                      ?>
                        <option 
                          value="<?php echo $set['category_id'] ?>"
                          <?php if (isset($product_category_id)) {
                            echo (($product_category_id==$set['category_id']) ? "selected" : "");
                          } ?>
                        >
                          <?php echo $set['category_name'] ?>
                        </option>
                      <?php endwhile; ?>
                    </select>
                    <p class="text-danger" id="product_category_id_err"></p>
                  </div>
                  <div class="col-md-12 my-3">
                    <input type="hidden" name="product_trademark_id" value="<?php echo (isset($product_trademark_id) ? $product_trademark_id : '') ?>">
                    <label for="product_trademark_id" class="form-label">Thương hiệu sản phẩm</label>
                    <select id="product_trademark_id" class="select2 form-select" name="product_trademark_id">
                      <option disabled selected>Lựa chọn thương hiệu</option>
                      <?php 
                        $trademark = new Trademark();
                        $results = $trademark->getListTrademark(); 
                        while($set = $results->fetch()):
                      ?>
                        <option 
                          value="<?php echo $set['trademark_id'] ?>"
                          <?php if (isset($product_trademark_id)) {
                            echo ($product_trademark_id==$set['trademark_id'] ? "selected" : "");
                          } ?>
                        >
                          <?php echo $set['trademark_name'] ?>
                        </option>
                      <?php endwhile; ?>
                    </select>
                    <p class="text-danger" id="product_trademark_id_err"></p>
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="hidden" name="product_thumbnail" id="product_thumbnail" value="<?php if (isset($product_id)) echo $product_thumbnail ?>" />
                    <label for="product_thumbnail" class="form-label">Ảnh đại diện sản phẩm</label>
                    <!-- <input type="file" name="" id=""> -->
                    <div id="displaythumbnail" class="mb-3" style="
                      display: flex;
                      align-items: center;
                      justify-content: center; 
                      ">
                      </div>
                    <input type="file" name="uploadThumbnail" id="uploadThumbnail" class="uploadThumbnail" >
                    <p class="text-danger" id="product_thumbnail_err"></p>
                  </div>
                  
                  <!-- <div class="col-md-12">
                    <label for="product_gallery">Ảnh gallery</label>
                    <input type="file">
                  </div> -->
                  <div class="col-md-12 my-3 ">
                    <h5>Hình sản phẩm</h5>
                    <input type="hidden" name="product_gallery" id="images" value="<?php if (isset($id_sanpham)) echo $hinh_sanpham ?>">
                    <div class="d-flex justify-content-between">
                        <?php if (isset($id_sanpham)) :
                            $arrayImg = explode(';', $hinh_sanpham);
                            foreach ($arrayImg as $key => $value) :
                        ?>
                                <img src="../../Content/images/<?php echo $value; ?>" alt="" width="20%" id="showImage"><br>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <!-- <label for="image" class="form-label">Chọn file để upload</label>
                    <input class="form-control form-control-lg" id="image" name="image[]" multiple type="file" onchange="readURL(this);" value="<?php if (isset($id_sanpham)) echo $hinh_sanpham ?>"> -->
                    <input type="file" id='files' name="files[]" multiple><br>
                    <input type="button" id="submit" value='Upload'>
                    <div id='preview' class="row"></div>
                  </div>
                  </div>
                  
                </div>
              <div class="mt-2">
                <div class="row">
                  <div class="col-md-6">
                    <label for="" class="form-label">Option</label>
                    <input 
                      type="text"
                      class="form-control"
                      id="option"
                      name="option"
                      >
                  </div>
                  <div class="col-md-6">
                    <label for="" class="form-label">Giá trị</label>
                    <input 
                      type="text"
                      class="form-control"
                      id="option"
                      name="option"
                      >
                  </div>
                </div>
              </div>
              <div class="mt-2">
                <!-- <button type="button" class="btn btn-primary me-2" id="insertBtn"> -->
                  <?php 
                    if ($ac == 'insert') {
                      echo '
                      <button type="button" class="btn btn-primary me-2" id="insertBtn">Tạo mới</button>
                      <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                      ';
                    } elseif ($ac == 'update') {
                      echo '
                      <button type="button" class="btn btn-primary me-2" id="insertBtn">Cập nhật</button>
                      <button type="reset" class="btn btn-outline-secondary" onclick="window.history.back()">Cancel</button>
                      ';
                    }
                  ?>
                <!-- </button> -->
              </div>
            </form>
          </div>
          
        </div>
        <div class="card">
          <h5 class="card-header">Delete Account</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
              </div>
            </div>
            <form id="formAccountDeactivation" onsubmit="return false">
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="accountActivation"
                  id="accountActivation"
                />
                <label class="form-check-label" for="accountActivation"
                  >I confirm my account deactivation</label
                >
              </div>
              <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    
  </div>
</div>

<script src="public/assets/js/ui-toasts.js"></script>

<script>
  $(document).ready(function() {
    tinymce.init({
      selector: '#product_description',
      plugins: [
          'autolink', 
          'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
          'fullscreen', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
      ],
      toolbar: 'undo redo | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help',
      height: 600
      
    });
    $('#submit').click(function() {
            var form_data = new FormData();
            var arrImg = [];
            /* Read selected files */
            var totalfiles = document.getElementById('files').files.length;
            var files = document.getElementById('files');
            for (let i = 0; i < totalfiles; i++) {
                const element = files.files[i].name;
                arrImg.push(files.files[i].name)
            }
            console.log(arrImg);
            if (arrImg.lenth != 0) {
                var strNameImg = arrImg.join(';');
                $('#images').val(strNameImg);
                 
            }

            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
            }

            /* AJAX request */
            $.ajax({
                type: 'post',
                url: 'Admin/View/ajax/ajaxfile.php',
                data: form_data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {

                    for (var index = 0; index < response.length; index++) {
                        var src = response[index];
                        // var nameImg = response[index].name;

                        /* Thêm 1 element là img vào trong div có id là preview */
                        $('#preview').append(`
                        <div class="col-md-4">
                          <img src="${src}" class="img-thumbnail" style="width: auto; height: 200px; max-width: 200px">
                        </div>`);
                        // $('#images').val(nameImg);
                    }

                }
            });

        });
    
    $('#uploadThumbnail').on('change', function() {
      console.log("test");
      var file_data = $(this).prop('files')[0];
      var form_data = new FormData();
      var ext = $(this).val().split('.').pop().toLowerCase();
      if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
          alert("file không đúng định dạng");
          return;
      }
      var picsize = (file_data.size);
      console.log(picsize); /*in byte*/
      if (picsize > 2097152) /* 2mb*/ {
          alert("kích thước ảnh quá lớn")
          return;
      }

      form_data.append('file', file_data);
      $.ajax({
          url: 'Admin/View/ajax/upload.php',
          /*point to server-side PHP script */
          dataType: 'text',
          /* what to expect back from the PHP script, if anything*/
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(response) {
              const json = JSON.parse(response);
              console.log(json.code);
              $('#displaythumbnail').append(`<img src="../../../public/assets/img/products/${json.code}" width="200" class="img-thumbnail" height="200">`)
          }
      });
    });
    $('.uploadThumbnail').on('change', function(e){
        var filename = e.target.files[0].name;
        var thumbnail = $('#product_thumbnail');
        thumbnail.val(filename);
    })
    
    $('#insertBtn').click(function(){
      tinyMCE.triggerSave();
      if (!check_productName() && !check_productInventory() && !check_productUnit() && !check_productPrice() && !check_productTrademark() && !check_productCategory() && !check_productThumbnail()) {
        console.log('err1');
        $('#message').html('<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin sản phẩm</div>');
      } else if (!check_productName() || !check_productInventory() || !check_productUnit() || !check_productPrice() || !check_productTrademark() || !check_productCategory() || !check_productThumbnail()) {
        console.log('err2');
        $('#message').html('<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin sản phẩm</div>');
      } else {
        console.log('ok')
        $('#message').html('');
          var form = $('#form')[0];
          var data = new FormData(form);
          $.ajax({
              type: 'POST',
              url: 'Admin/View/ajax/insertProduct.php',
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              async: false,
              success: function(data) {
                $('#message').html(data);
                $('#message').html(`
                <div
                  class="bs-toast toast fade show bg-success"
                  role="alert"
                  aria-live="assertive"
                  aria-atomic="true"
                >
                  <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Bootstrap</div>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                    Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.
                  </div>
                </div>
                `)
              },
              complete: function() {
                  setTimeout(function() {
                      $('#form').trigger("reset");
                      $('#submitbtn').html('Submit');
                      $('#submitbtn').attr("disabled", false);
                      $('#submitbtn').css({
                          "border-radius": "4px"
                      });
                  }, 5000);
              }
          })
      }
    })
    
    $('#product_name').on('input', function() {
      check_productName();
    })
    
    $('#product_inventory').on('input', function() {
      check_productInventory();
    })
    
    $('#product_unit_id').on('change', function() {
      check_productUnit();
    })
    
    $('#product_price').on('input', function() {
      check_productPrice();
    })
    
    $('#product_category_id').on('input', function() {
      check_productCategory();
    })
    
    function check_productCategory() {
      var productCategory = $('#product_category_id').val();
      if (!productCategory) {
        $('#product_category_id_err').html('Vui lòng chọn danh mục sản phẩm');
        return false;
      } else {
        return true;
      }
    }
    
    function check_productTrademark() {
      var productTrademark = $('#product_trademark_id').val();
      if (!productTrademark) {
        $('#product_trademark_id_err').html('Vui lòng chọn danh mục sản phẩm');
        return false;
      } else {
        return true;
      }
    }
    
    function check_productPrice() {
      var productPrice = $('#product_price').val();
      var regex = /^(\$|)([1-9]\d{0,2}(\,\d{3})*|([1-9]\d*))(\.\d{2})?$/;
      var priceValid = regex.test(productPrice);
      if (productPrice == '') {
          $('#product_price_err').html('Vui lòng nhập giá sản phẩm');
          return false;
      } else if (!priceValid) {
          $('#product_price_err').html('Giá chỉ được nhập số')
          return false;
      } else {
          $('#product_price_err').html('')
          return true;
      }
    }
    
    function check_productUnit() {
      var product_unit_id = $('#product_unit_id').val();
      if (!product_unit_id) {
        $('#product_unit_id_err').html('Vui lòng chọn đơn vị sản phẩm');
        return false;
      } else {
        return true;
      }
    }
    
    function check_productInventory() {
      var product_inventory = $('#product_inventory').val();
      var regex = /^(\$|)([1-9]\d{0,2}(\,\d{3})*|([1-9]\d*))(\.\d{2})?$/;
      var inventoryValid = regex.test(product_inventory);
      if (product_inventory == '') {
          $('#product_inventory_err').html('Vui lòng nhập số lượng tồn kho');
          return false;
      } else if (!inventoryValid) {
          $('#product_inventory_err').html('Số lượng chỉ được nhập số')
          return false;
      } else {
          $('#product_inventory_err').html('')
          return true;
      }
    }
    
    function check_productName() {
      var tensanpham = $('#product_name').val();
      if (tensanpham == "") {
          $('#product_name_err').html('Vui lòng nhập tên sản phẩm');
          return false;
      } else if (tensanpham.length <= 3) {
          $('#product_name_err').html('Tên sản phẩm quá ngắn')
          return false;
      } else if (tensanpham.length >= 255) {
        $('#product_name_err').html('Tên sản phẩm quá dài')
      } else {
          $('#product_name_err').html('');
          return true;
      }
    }
    
    function check_productThumbnail() {
      var productThumbnail = $('#product_thumbnail').val();
      if (!productThumbnail) {
        $('#product_thumbnail_err').html('Vui lòng chọn ảnh đại diện sản phẩm');
        return false;
      } else {
        return true;
      }
    }
    
  })
</script
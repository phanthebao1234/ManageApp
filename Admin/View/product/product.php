<div class="layout-page">
    <div class="content-wrapper">
        <div class="container-xxl ">
            <div class="card">
                <h5 class="card-header">Danh sách sản phẩm</h5>
                <div class="table-responsive text-nowrap card-datatable card-body m-5">
                    <table class="table table-hover datatables-basic border-top" id="tableProduct">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng tồn</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                                $product = new Product();
                                $unit = new Unit();
                                $results = $product->getListProducts();
                                $i = 0;
                                while ($set = $results->fetch()):
                                    $result_unit = $unit->getDetailUnit($set['product_unit_id']);
                                    $i++; 
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    
                                    <td>
                                        <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> -->
                                        <strong>
                                            <?php echo $set["product_name"]; ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller"
                                            >
                                                <img src="public/assets/img/products/waversxfi110img1.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <?php echo number_format($set["product_price"]) . "đ"; ?>
                                    </td>
                                    <td>
                                        <?php echo $set["product_inventory"]  ?>
                                    </td>
                                    <td>
                                            <?php 
                                                if ($set["product_status"] == 1 ) {
                                                    echo '<span class="badge bg-label-primary me-1">Active</span>';
                                                } else {
                                                    echo '<span class="badge bg-label-danger me-1">Negative</span>';
                                                }
                                            ?>
                                        
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="index.php?action=product&act=update&id=<?php echo $set[
                                        "product_id"
                                        ]; ?>"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                            >
                                            <a class="dropdown-item" href="index.php?action=product&act=remove&id=<?php echo $set[
                                        "product_id"
                                        ]; ?>"
                                            ><i class="bx bx-trash me-1"></i> Delete</a
                                            >
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            endwhile;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableProduct').DataTable({
            dom: '<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            pageLength: 10,
            lengthMenu: [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
            buttons: [
                {
                    extend: "collection",
                    className: "btn btn-label-primary dropdown-toggle me-2",
                    text: '<i class="bx bx-show me-2"></i>Export',
                    buttons: [
                        {   
                        extend: 'print',
                        className: 'dropdown-item',
                        text: '<i class="far fa-print"></i> In',
                        exportOptions: { columns: [1,2,3,4,5] },
                        },
                        {
                            extend: 'excel',
                            className: 'dropdown-item',
                            text: '<i class="far fa-file-excel"></i> Excel',
                            exportOptions: { columns: [1,2,3,4,5] },
                            // init: function(api, node, config) {
                            //     $(node).removeClass('dt-button dt-buttons')
                            // }
                        },
                        {
                            extend: 'csv',
                            className: 'dropdown-item',
                            text: '<i class="far fa-file-csv"></i> CSV', 
                            exportOptions: { columns: [1,2,3,4,5] },
                            // init: function(api, node, config) {
                            //     $(node).removeClass('dt-button dt-buttons')
                            // }
                        },
                        {
                            extend: 'pdf',
                            className: 'dropdown-item',
                            text: '<i class="far fa-file-pdf"></i> PDF',
                            exportOptions: { columns: [1,2,3,4,5] },
                            // init: function(api, node, config) {
                            //     $(node).removeClass('dt-button dt-buttons')
                            // }
                        },
                        {
                            extend: 'copy',
                            className: 'dropdown-item',
                            text: '<i class="far fa-copy"></i> Copy',
                            exportOptions: { columns: [1,2,3,4,5] },
                            // init: function(api, node, config) {
                            //     $(node).removeClass('dt-button dt-buttons')
                            // }
                        },
                    ]
                },
                {
                    text: '<i class="bx bx-plus me-2"></i> <span class="d-none d-lg-inline-block">Add New Record</span>',
                    className: "create-new btn btn-primary",
                },
            ],
            initComplete: function(api, node, config) {
                // $('.dataTables_filter').addClass('btn btn-sm btn-dark');
                // $('.ui-button').addClass('btn btn-primary text-white');
            }
        });
        
        // $('.ui-button').addClass('btn btn-primary text-white');
        // $('.dt-buttons').addClass('dropdown-toggle');
        $('div.head-label').html('<h5 class="card-title mb-0">DataTable with Buttons</h5>');
        $('.dropdown-toggle').on('click', function() {
            $('dropdown-item').css('display', 'block');
        })
    })
</script>



window.onload = function () {
    "use strict";

    let tbody = document.querySelector("#tbody"),
        salesTableNumber = document.querySelector(".sales-table"),
        ul_types = document.getElementById("ul-types"),
        final_price = document.getElementById("final-price"),
        kashMoney = document.getElementById('kashMoney'),
        ckeckMoney = document.getElementById('ckeckMoney');


    // ============== Start Increace Orders ===========
    $(document).on("click", ".increace", function () {
        kashMoney.value = 0;
        ckeckMoney.parentElement.style.visibility = 'hidden';
        let parentId = this.parentElement.getAttribute("id");

        $.get("/increace-orders/" + this.parentElement.getAttribute("id"),
            function (data, status, xhr) {

                if (data.status == true && status == "success") {
                    // == set text to price orders ==
                    final_price.textContent = data.final_price;
                    let current = 1;

                    // ==== Condition For Remove TR Form Tbody Element====
                    if (tbody.hasChildNodes()) {
                        while (tbody.hasChildNodes()) {
                            tbody.removeChild(tbody.childNodes[0]);
                        }

                        // ====== Fetch Orders In TR Element =====
                        FetchData(data.orders, current);

                    }
                }


            }
        );
    });
    // ============== End Increace Orders ===========


    // ============== Start dicreace Orders ===========
    $(document).on("click", ".dicreace", function () {

        // == set value to kashMoney ==
        kashMoney.value = 0;
        ckeckMoney.parentElement.style.visibility = 'hidden';

        // ===== Ajax jQuery -- Method Get =====
        $.get("/dicreace-orders/" + this.parentElement.getAttribute("id"),

            function (data, status, xhr) {

                if (data.status == true && status == "success") {
                    // == set text to price orders ==
                    final_price.textContent = data.final_price;
                    let current = 1;

                    // ==== Condition For Remove TR Form Tbody Element====
                    if (tbody.hasChildNodes()) {
                        while (tbody.hasChildNodes()) {
                            tbody.removeChild(tbody.childNodes[0]);
                        }

                        // ====== Fetch Orders In TR Element =====
                        FetchData(data.orders, current);
                    }
                }
            }
        );
    });
    // ============== End dicreace Orders ===========


    // ============== Start Select Food For Add To Orders ===========
    $(document).on("click", ".select-type-food", function () {

        // ==== Get Attribute Type ====
        let type_id = this.getAttribute('type_id'),
            price_sale = this.getAttribute('price_sale'),
            type_name = this.getAttribute('type_name'),
            _token = this.parentElement.getAttribute("_token"),
            sales_table_number = salesTableNumber.getAttribute("id");

        let type_data = {
            _token: _token,
            type_id: type_id,
            type_amount: 1,
            type_price: price_sale,
            sales_table: sales_table_number,
            status: 0,
        }

        // ===== Ajax jQuery -- Method Post =====
        $.post("/add-to-orders", type_data,
            function (data, status, xhr) {

                if (data.status == true && status == "success") {

                    // == set text for orders price ==
                    final_price.textContent = data.final_price;
                    let current = 1;

                    // ==== Condition For Remove TR Form Tbody Element====
                    if (tbody.hasChildNodes()) {
                        while (tbody.hasChildNodes()) {
                            tbody.removeChild(tbody.childNodes[0]);
                        }

                        // ====== Fetch Orders In TR Element =====
                        FetchData(data.orders, current);
                    }
                }
            }
        );
    });
    // ============== End Select Food For Add To Orders ===========


    // ==========================================================================================================


    // ============== Start Get Category Item ===============
    $(document).on("click", ".get-item", function () {

        // ul_types.style.width = "80%";
        // ul_types.style.transition = ".2s ease-in";

        ul_types.classList.add('ifect');

        // ===== jQuery Ajax -- method get()    ====
        $.get("/get-item/" + this.getAttribute("id"),

            function (data, status, xhr) {
                if (data.status == true && status == "success") {

                    // ul_types.style.width = "100%";
                    // ul_types.style.transition = ".5s ease-in";

                    // ==== Condition For Remove Types Form UL Element====
                    if (ul_types.hasChildNodes()) {

                        while (ul_types.hasChildNodes()) {
                            ul_types.removeChild(ul_types.childNodes[0]);
                        }

                        ul_types.style.transform = "translateY(0px)";

                        // ====== Fetch Types In UL Element =====
                        data.types.forEach((typeData) => {

                            let li = document.createElement("li");

                            li.innerHTML = typeData.type_name + "<span>" + " SD /  " + typeData.price_sale + "</span>";

                            // == Set Attributes for LI Element ==
                            li.setAttribute("class", "select-type-food");
                            li.setAttribute("type_id", typeData.id);
                            li.setAttribute("type_name", typeData.type_name);
                            li.setAttribute("price_sale", typeData.price_sale);

                            // == Append Li In UL Element ==
                            ul_types.appendChild(li);

                        });
                            ul_types.classList.remove('ifect');
                    } else {
                          ul_types.classList.remove('ifect');
                        // ====== Fetch Types In UL Element =====
                        data.types.forEach((typeData) => {

                            let li = document.createElement("li");

                            li.innerHTML = typeData.type_name + "<span>" + " SD /  " + typeData.price_sale + "</span>";

                            // == Set Attributes for LI Element ==
                            li.setAttribute("class", "select-type-food");
                            li.setAttribute("type_id", typeData.id);
                            li.setAttribute("type_name", typeData.type_name);
                            li.setAttribute("price_sale", typeData.price_sale);

                            // == Append Li In UL Element ==
                            ul_types.appendChild(li);

                        });
                    }

                }
            }
        );
    });
    // ============== End Get Category Item ===============




    // ==========================================================================================================





    // ============= Start Delete Order =============
    $(document).on("click", ".cancel_order", function () {
        let parentElement = this.parentElement,
            order_id = this.getAttribute("id");

        // ======== Start ConFirm Alert ======
        swal({
            title: "هل تريد حذف الطلب ؟ ",
            text: "",
            buttons: true,
            dangerMode: true,
            dangerModeButton: 'true',
        }).then((willDelete) => {

            if (willDelete) {

                // == Ajax jQuery -- Method Get ==
                $.get("/delete_order/" + order_id,

                    function (data, status) {
                        if (data.status == true && status == "success") {
                            parentElement.style.display = 'none'; // .remove();
                            final_price.textContent = data.final_price;
                            successMessage(' ... تم حذف الطلب بنجاح ');
                        }
                    }
                );

            }
        });
        // ======== End ConFirm Alert ======


    });
    // ============= End Delete Order =============



    // ============= Start Reject Orders =============
    $(document).on("click", "#reject_orders", function (e) {
        e.preventDefault();

        if (final_price.textContent > 0) {

            // ======== Start ConFirm Alert ======
            swal({
                title: "هل تريد حذف الطلبات ؟",
                text: "",
                buttons: true,
                dangerMode: true,
                dangerModeButton: 'true',
            }).then((willDelete) => {

                if (willDelete) {

                    // == Ajax jQuery -- Method Get ==
                    $.get("/reject_orders/" + salesTableNumber.getAttribute("id"),
                        function (data, status, xhr) {
                            if (data.status == true) {
                                final_price.textContent = 0;
                                kashMoney.value = 0;
                                ckeckMoney.parentElement.style.visibility = 'hidden';
                                successMessage(" ... تم حذف الطلبات بنجاح ");

                                if (tbody.hasChildNodes()) {

                                    let tbody_tr = document.querySelectorAll("#tbody tr");
                                    tbody_tr.forEach((element) => {
                                        element.setAttribute("class", "hide-order");
                                    });

                                }
                            }
                        }
                    );
                }
            });
            // ======== End ConFirm Alert ======

        }
    });
    // ============= End Reject Orders =============


    // ============== Start Ckeck Monay Is Ok ===========

    if (kashMoney) {

        kashMoney.addEventListener('input', function () {

            if (final_price.textContent > 0) {
                if (!isNaN(kashMoney.value)) {
                    if (parseFloat(kashMoney.value) < final_price.textContent) {

                        ckeckMoney.textContent = parseFloat(kashMoney.value) + " |  المبلغ غير مكتمل";
                        ckeckMoney.parentElement.classList.remove('success');
                        ckeckMoney.parentElement.classList.add('error');
                        ckeckMoney.parentElement.style.visibility = 'visible';


                    } else if (parseFloat(kashMoney.value) == final_price.textContent) {
                        ckeckMoney.textContent = parseFloat(kashMoney.value) + " |  المبلغ  مكتمل"
                        ckeckMoney.parentElement.classList.remove('error');
                        ckeckMoney.parentElement.classList.add('success');
                        ckeckMoney.parentElement.style.visibility = 'visible';

                    }
                    else if (parseFloat(kashMoney.value) > final_price.textContent) {
                        ckeckMoney.textContent = parseFloat(kashMoney.value) + " | المبلغ  اكبر من المتوقع"
                        ckeckMoney.parentElement.classList.remove('success');
                        ckeckMoney.parentElement.classList.add('error');
                        ckeckMoney.parentElement.style.visibility = 'visible';

                    }

                } else {
                    ckeckMoney.textContent = "  المبلغ  غير  صحيح";
                    ckeckMoney.parentElement.classList.remove('success');
                    ckeckMoney.parentElement.classList.add('error');
                    ckeckMoney.parentElement.style.visibility = 'visible';

                }

            }
        });
    }
    // ============== End Ckeck Monay Is Ok ===========


    // ============== Start  Accepte The Reset  ===========
    $(document).on("click", "#accepte", function (e) {
        e.preventDefault();

        if (kashMoney.value == '') kashMoney.value = 0;

        if (final_price.textContent > 0) {

            if (parseFloat(kashMoney.value) < final_price.textContent || isNaN(kashMoney.value)) {
                warningMessage('أكمل المبلغ اولاً ');
            } else {

                // ======= Start ConFirm Alert =======
                swal({
                    title: "هل تريد تاكيد الطلبات ؟",
                    text: "",
                    buttons: true,
                    dangerMode: true,
                    dangerModeButton: 'true',
                }).then((willDelete) => {

                    if (willDelete) {

                        let tbody_tr = document.querySelectorAll("#tbody tr");
                        tbody_tr.forEach((element) => {
                            element.setAttribute("class", "hide-order");
                        });

                        // == Ajax jQuery -- Method Post ==
                        $.post("/add-reset",
                            {
                                _token: $(this).attr("_token"),
                                final_price: final_price.textContent,
                                table_number: salesTableNumber.getAttribute("id"),
                                weater_id: $("select[name='weater_name']").val(),
                            },
                            function (data, status, xhr) {
                                if (data.status == true) {
                                    console.log("status success => " + status);
                                    final_price.textContent = 0;
                                    kashMoney.value = 0;
                                    ckeckMoney.parentElement.style.visibility = 'hidden';
                                    successMessage(' ... تم التاكيد بنجاح ');
                                }
                            }
                        );

                    }
                });
                // ======= End ConFirm Alert =======

            }
        }
    });
    // ============== End  Accepte The Reset  ===========




    // ================ Count All Price For Buys ============
    setInterval(() => {
        let amount = document.getElementById('amount'),
            unit_price = document.getElementById('unitPrice'),
            final_price = document.getElementById('finalPrice');

        if (amount.value != '' && unit_price.value != '') {
            if (parseFloat(amount.value) > 0 && parseFloat(unit_price.value) > 0)
                final_price.value = parseFloat(amount.value) * parseFloat(unit_price.value);
        }


    }, 1000);


    // ==================  Validation Category Name ================
    if (document.getElementById("input_category_name")) {

        let inputCategoryName = document.getElementById("input_category_name");

        inputCategoryName.addEventListener('input', function () {
            if (this.value.length > 0 && this.value != "") {
                $.get('/get-category-name/' + this.value,

                    function (data, status) {
                        if (data.message == true) {
                            inputCategoryName.classList.add('border-danger');
                            document.querySelector('.small-text').textContent = "هذا الاسم موجود بالفعل !!";
                        } else {
                            inputCategoryName.classList.remove('border-danger');
                            document.querySelector('.small-text').textContent = " ";
                        }

                    });
            }
        });

    }


    // ===== Function Search About Same Data =====
    // =========================================================================================================


    // ################## Start All Events For Delete ##############

    // =========== Delete User =======
    $(document).on("click", ".delete-user", function (event) {
        event.preventDefault();

        //   =====  call Function Delete By Id ======
        deleteById(
            "هل تريد حذف المستخدم ؟  ",
            "delete-user/",
            this.getAttribute("data-id-for-delete")
        );
    });


    // =========== Delete Category =======
    $(document).on("click", ".delete-category", function (event) {
        event.preventDefault();

        // == Get Category Id ==
        let category_id = this.getAttribute("data-id-for-delete");

        // == Start Message ConFrim ==
        swal({
            title: "هل تريد حذف  هذا القسم  ؟  ",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            dangerModeButton: 'true',
        }).then((willDelete) => {

            // == Start -- In Status ConFrim == True ==
            if (willDelete) {

                // == Ajax  jQuery -- Method Get ==
                $.get('check-for-delete/' + category_id, function (data, status) {

                    // == Start -- Response ==
                    if (data.status) {
                        // == Message ConFrim ==
                        swal({
                            title: "قد يوجد اصناف في هذا القسم هل تريد الحذف ؟ ",
                            text: "",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            dangerModeButton: 'true',
                        }).then((willDelete) => {

                            // == Start In Status ConFrim == True ==
                            if (willDelete) {

                                // == Ajax  jQuery -- Method Get ==
                                $.get('delete-category/' + category_id, function (data, status) {

                                    if (data.status) {
                                        if (data.status == true) {
                                            document.querySelector(".delete-data-" + category_id)
                                                .remove();
                                            successMessage(" تم الحذف بنجاح ");
                                        }
                                    }

                                });

                            }
                            // == End In Status ConFrim == True ==

                        });
                    }
                    // == End -- Response ==

                });

            }
            // == End -- In Status ConFrim = True ==

        });
        // == End Message ConFrim ==

    });


    // =========== Delete Type =======
    $(document).on("click", ".delete-type", function (event) {
        event.preventDefault();

        //   =====  call Function Delete By Id ======
        deleteById(
            "هل تريد حذف  هذا الصنف  ؟  ",
            "delete-type/",
            this.getAttribute("data-id-for-delete")
        );
    });


    // =========== Delete Waiter =======
    $(document).on("click", ".delete-waiter", function (event) {
        event.preventDefault();

        //   =====  call Function Delete By Id ======
        deleteById(
            "هل تريد حذف  هذا الويتر  ؟  ",
            "delete-weater/",
            this.getAttribute("data-id-for-delete")
        );
    });


    // =========== Delete Supplier =======
    $(document).on("click", ".delete-supplier", function (event) {
        event.preventDefault();

        // == Get Category Id ==
        let supplier_id = this.getAttribute("data-id-for-delete");

        // == Start Message ConFrim ==
        swal({
            title: "هل تريد حذف  هذا المورد  ؟  ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            dangerModeButton: 'true',
        }).then((willDelete) => {

            // == Start -- In Status ConFrim == True ==
            if (willDelete) {

                // == Ajax  jQuery -- Method Get ==
                $.get('check-delete-supplier/' + supplier_id, function (data, status) {

                    // == Start -- Response ==
                    if (data.status == true) {
                        // == Message ConFrim ==
                        swal({
                            title: "قد يوجد مشتريات باسم هذا المورد  هل تريد الحذف ؟ ",
                            text: "",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            dangerModeButton: 'true',
                        }).then((willDelete) => {

                            // == Start In Status ConFrim == True ==
                            if (willDelete) {

                                // == Ajax  jQuery -- Method Get ==
                                $.get('delete-supplier/' + supplier_id, function (data, status) {

                                    if (data.status) {
                                        if (data.status == true) {
                                            document.querySelector(".delete-data-" + supplier_id)
                                                .remove();
                                            successMessage(" تم الحذف بنجاح ");
                                        }
                                    }

                                });

                            }
                            // == End In Status ConFrim == True ==

                        });
                    } else {
                        // == Ajax  jQuery -- Method Get ==
                        $.get('delete-supplier/' + supplier_id, function (data, status) {

                            if (data.status) {
                                if (data.status == true) {
                                    document.querySelector(".delete-data-" + supplier_id)
                                        .remove();
                                    successMessage(" تم الحذف بنجاح ");
                                }
                            }

                        });
                    }
                    // == End -- Response ==

                });

            }
            // == End -- In Status ConFrim = True ==

        });
        // == End Message ConFrim ==

    });


    // =========== Delete Buys =======
    $(document).on("click", ".delete-buys", function (event) {
        event.preventDefault();

        //   =====  call Function Delete By Id ======
        deleteById(
            "هل تريد حذف  هذه المشتريات  ؟  ",
            "delete-buy/",
            this.getAttribute("data-id-for-delete")
        );
    });


    // ################## End All Events For Delete ##############


    // ======================================================================================================


    // ################## Start Success Messages   ##################

    if (document.querySelector('.success-update')) {
        // ===== call success message function ====
        successMessage(document.querySelector('.success-update').getAttribute('data-message'));
    }

    if (document.querySelector('.success-store')) {
        // ===== call success message function ====
        successMessage(document.querySelector('.success-store').getAttribute('data-message'));
    }

    // ################## End Success Messages   ##################


    // =========================================================================================================

    // ################# Start All Diynamic Functions #################

    // ====== function  delete by id =======
    function deleteById(confrim_message, url, attribute_data_id) {

        console.log('confrim_message => ' + confrim_message);
        console.log('url => ' + url);
        console.log('attribute_data_id => ' + attribute_data_id);
        swal({
            title: confrim_message,
            text: "",
            // icon: "error",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            dangerModeButton: 'true',
        }).then((willDelete) => {

            if (willDelete) {

                console.log("in");
                $.get(url + attribute_data_id, function (data, status) {
                    if (data.status) {
                        if (data.status == true) {
                            document
                                .querySelector(".delete-data-" + attribute_data_id)
                                .remove();
                            swal("  ... تم الحذف بنجاح ", {
                                icon: "success",
                            });
                        }
                    }
                });

            }
        });
    }


    // ======= function Success Message ======
    function successMessage(data_message) {
        // swal(data_message);
        swal({
            title: data_message,
            icon: "success",
            button: "تم ",
        });
    }

    // ======= function Error Message ======
    function errorMessage(data_message) {
        // swal(data_message);
        swal({
            title: data_message,
            icon: "error",
            button: "تم ",
        });
    }

    // ======= Function Warning Message ======
    function warningMessage(data_message) {
        swal({
            title: data_message,
            icon: "warning",
            button: "تم ",
        });
    }

    // ======= Function Fetch Order Data  ======
    function FetchData(matrxData, current) {
        // ====== Fetch Orders In TR Element =====
        matrxData.forEach((orderData) => {

            // == Create Elements ==
            let tr_table_row = document.createElement("tr"),
                td_type_name = document.createElement("td"),
                td_current = document.createElement("td"),
                td_type_amount = document.createElement("td"),
                td_type_price = document.createElement("td"),
                td_final_price = document.createElement("td"),
                td_type_created_at = document.createElement("td"),
                td_cancel_order = document.createElement("td"),
                span_increace = document.createElement("span"),
                span_dicreace = document.createElement("span");

            // == Set Text Content To Elements ==
            td_type_name.textContent = orderData.type__fun__relation.type_name; //===  set
            td_current.textContent = current++; //===  set
            td_type_amount.textContent = orderData.type_amount; //===  set
            td_type_price.textContent = orderData.type_price; //===  set
            td_final_price.textContent = td_type_amount.textContent * orderData.type_price; //===  set
            td_type_created_at.textContent = orderData.created_at; //===  set
            td_cancel_order.textContent = "x";
            span_increace.textContent = "+";
            span_dicreace.textContent = "-";

            // == Set Class ==
            span_increace.classList.add("increace");
            span_dicreace.classList.add("dicreace");
            td_cancel_order.classList.add("cancel_order");
            td_type_amount.classList.add("type_amount");

            // == Set Attribute ==
            td_cancel_order.setAttribute("id", orderData.id);
            td_type_amount.setAttribute("id", orderData.id);


            // == Append Element  ==
            td_type_amount.appendChild(span_increace);
            td_type_amount.appendChild(span_dicreace);
            tr_table_row.appendChild(td_current);
            tr_table_row.appendChild(td_type_name);
            tr_table_row.appendChild(td_type_amount);
            tr_table_row.appendChild(td_type_price);
            tr_table_row.appendChild(td_final_price);
            tr_table_row.appendChild(td_type_created_at);
            tr_table_row.appendChild(td_cancel_order);
            tbody.appendChild(tr_table_row);

        });
    }



    // ################# End All Diynamic Functions #################

    // =========================================================================================================






    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('0a346bfab8a4bb5b0d19', {
    //     cluster: 'mt1'
    // });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {
    //   alert(JSON.stringify(data));
    // });




    // ======================================================================================================



let Menu = document.querySelector('.dropdown-menu'),
    ToggelButton = document.querySelector('.dropdown-toggle');

    ToggelButton.addEventListener( 'click', function(){
      Menu.classList.toggle('show');
    //   Menu.style.top = "10%";
    });














    // box-print
    $(document).on("click", "#print_report", function () {
        document.querySelector(".box-print").style.visibility = "hidden";
        setTimeout(function () {
            print();
            document.querySelector(".box-print").style.visibility = "visible";
        }, 1000);
    });

    // $(document).on('click','.type-food',function(){
    //      $.post('/add-to-orders' ,
    //            {
    //             _token          : this.getAttribute('_token'),
    //             type_id         : this.getAttribute('data-typeId'),
    //             type_name       : this.getAttribute('data-typeName'),
    //             type_amount     : 1,
    //             type_price      : this.getAttribute('data-typePrice'),
    //             final_price     : this.getAttribute('data-typePrice'),

    //            },function(data , status,xhr){

    //         if(data.status == true && status == "success"){

    //         }

    //       });
    //     console.log(this.getAttribute('data-typeId'));
    //     console.log(this.getAttribute('data-typeName'));
    //     console.log(this.getAttribute('data-typePrice'));

    //   this.getAttribute('data-typeName');
    //   this.getAttribute('data-typePrice');
    //   this.getAttribute('data-tpyeId');

    // //   setItem(this.getAttribute('data-typeName');

    // });

    // ===== Start js for Side Menu ======

    // ==== get Element ====
    let toggelMenu = document.getElementById("toggel-menu"),
        sideMenu = document.getElementById("main-menu"),
        mainContent = document.getElementById("main-content");

    // ===== toggle to hile and show side menu ====
    // toggelMenu.onclick = function () {
    //     sideMenu.classList.toggle('hide');
    //     if (sideMenu.classList.contains('hide')) {
    //         mainContent.classList.remove('col-md-10');
    //         mainContent.classList.remove('col-sm-10');
    //         mainContent.classList.remove('col-xs-10');
    //         mainContent.classList.add('col-md-12');
    //         mainContent.classList.add('col-sm-12');
    //         mainContent.classList.add('col-xs-12');
    //     } else {
    //         sideMenu.classList.add('show');
    //         mainContent.classList.remove('col-md-12');
    //         mainContent.classList.remove('col-sm-12');
    //         mainContent.classList.remove('col-xs-12');
    //         mainContent.classList.add('col-md-10');
    //         mainContent.classList.add('col-sm-10');
    //         mainContent.classList.add('col-xs-10');

    //     }
    // }

    // ===== End js for Side Menu ======

    // var delete_category  = document.getElementsByClassName('delete-category');
    // console.log(delete_category);
    // $(document).on('click','.delete-category' ,function(e){
    // // delete_category.onclick = function(e){
    // e.preventDefault();
    //     function confirm_Function() {
    //         var message = "هل تريد حذف بيانات الحضور!";
    //         var delete_data = confirm(message);

    //       };
    //       confirm_Function();
    // };
};

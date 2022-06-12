 let sales_table = document.querySelector('.sales-table');
    // if(sales_table.getAttribute('id') == sales_table.getAttribute('id')){

    let type_food = document.querySelectorAll('.type-food'),
        tbody = document.querySelector('#tbody');
    // console.log(" localStorage.length = "+localStorage.length);

    // === Start code delete type food form table food ===
    $(document).on('click', '.food-delete', function() {

        let food_selected = document.querySelectorAll('.type-food#food-selected');

        food_selected.forEach(element => {
            if (this.getAttribute('data_type_name') == element.getAttribute('data-typeName')) {
                element.setAttribute('id', '');
                localStorage.removeItem(element.getAttribute('data-typeName'));
                this.parentElement.remove();
            }
        });

    });
    // === End code delete type food form table food ===

    let current = 1, amount = 1;

    let AM = document.querySelectorAll('.increace');


 $(document).on('click', '.increace', function() {

    let final_price = document.querySelectorAll('.final_price');
    // console.log(final_price);

        type_food.forEach(element =>{

            if(element.getAttribute('data-typeId') == this.getAttribute('da')){

            let amountt =  parseInt(localStorage.getItem(this.getAttribute('da')));
                localStorage.removeItem(this.getAttribute('da'));

                localStorage.setItem(this.getAttribute('da'),amountt = amountt + 1);

                this.textContent = localStorage.getItem(this.getAttribute('da'));


            }
        });

final_price.forEach(element =>{
                 console.log(element.getAttribute('data-finalPrice'));

            if(element.getAttribute('class_id') == this.getAttribute('da')){
                // setInterval(() => {
                 element.textContent  = this.textContent * element.getAttribute('data-finalPrice');

                // }, 1000);

            }

});


    });




    //=== Start forEach for types foods to show from localStorage ===
    type_food.forEach(element => {


        if (localStorage.getItem(element.getAttribute('data-typeName')) == element.getAttribute('data-typeName')) {

            let tr_table_row = document.createElement('tr'),
                td_type_name = document.createElement('td'),
                td_delete_type = document.createElement('td'),
                td_type_price = document.createElement('td'),
                td_type_current = document.createElement('td'),
                td_final_price = document.createElement('td'),
                td_type_amount = document.createElement('td');
                td_order_time = document.createElement('td');





            element.setAttribute('id', 'food-selected');
            td_type_amount.setAttribute('class','increace');
            td_type_amount.setAttribute('da',element.getAttribute('data-typeId'));

            td_final_price.setAttribute('data-finalPrice',element.getAttribute('data-typePrice'));
            td_final_price.setAttribute('class','final_price');
            td_final_price.setAttribute('class_id',element.getAttribute('data-typeId'));

            // console.log(td_type_amount.getAttribute('da'));

            //=== Start set Content for table data in [ td ] ===
            td_type_current.textContent = current++;
            td_type_name.textContent = localStorage.getItem(element.getAttribute('data-typeName')); //===  set type name

            td_type_amount.textContent = localStorage.getItem(element.getAttribute('data-typeId'));

            td_type_price.textContent = element.getAttribute('data-typePrice'); //===  set type price
            td_final_price.textContent = parseInt(element.getAttribute('data-typePrice') * td_type_amount.textContent);


            td_order_time.textContent  = localStorage.getItem(td_order_time);

            td_delete_type.textContent = 'x'; //=== set btn delete
            td_delete_type.setAttribute('class', 'food-delete'); //===  set attribute class => food-delete
            td_delete_type.setAttribute('data_type_name', element.getAttribute('data-typeName')); //===  set attribute  data


            //=== End set Content for table data in [ td ] ===


            //=== Start append child  td  in table row ===
            tr_table_row.appendChild(td_type_current);
            tr_table_row.appendChild(td_type_name);
            tr_table_row.appendChild(td_type_amount);
            tr_table_row.appendChild(td_type_price);
            tr_table_row.appendChild(td_final_price);
             tr_table_row.appendChild(td_order_time);
            tr_table_row.appendChild(td_delete_type);


            tbody.insertBefore(tr_table_row,tbody.lastElementChild);

            // tbody.appendChild(tr_table_row);

            //=== End append child  td  in table row ===

        }

    });
    //=== End forEach for types foods to show from localStorage ===

    // }


    $(document).on('click', '.type-food', function() {

        // console.log(this.getAttribute('data-tpyeId'));
        let tr_table_row = document.createElement('tr'),
            td_type_name = document.createElement('td'),
            td_delete_type = document.createElement('td'),
            td_type_price = document.createElement('td'),
            td_type_current = document.createElement('td'),
            td_type_amount = document.createElement('td'),
            td_order_time = document.createElement('td'),
            td_final_price = document.createElement('td');

            let td5 = document.createElement('td');



        if (this.getAttribute('id') !== 'food-selected') {
            // console.log(this.getAttribute('data-typePrice'));
            // === set attribute for food menu ===
            this.setAttribute('id', 'food-selected');

            td_type_amount.setAttribute('class','increace');
            td_type_amount.setAttribute('da',this.getAttribute('data-typeId'));

            td_final_price.setAttribute('data-finalPrice',this.getAttribute('data-typePrice'));
            td_final_price.setAttribute('class','final_price');
            td_final_price.setAttribute('class_id',this.getAttribute('data-typeId'));

            // console.log(" data-tpyeId => " +this.getAttribute('data-typeId'));
            //=== Start set Content for table data in [ td ] ===
            td_type_current.textContent = " ";
            td_type_name.textContent = this.getAttribute('data-typeName'); //===  set type name
            td_type_amount.textContent = amount;

            td_type_price.textContent = this.getAttribute('data-typePrice'); //===  set type price
            td_final_price.textContent = parseInt(this.getAttribute('data-typePrice') * td_type_amount.textContent);

            // td_order_time.textContent = new Date().getDay()+ "  :  "+ new Date().getDate() + " : " + new Date().getMonth();
            td_order_time.textContent = new Date().getFullYear() +"/"+ new Date().getMonth() +"/"+ new Date().getDay();

            td_delete_type.textContent = 'x'; //=== set btn delete
            td_delete_type.setAttribute('class', 'food-delete'); //===  set attribute class => food-delete
            td_delete_type.setAttribute('data_type_name', this.getAttribute('data-typeName')); //===  set attribute  data


            //=== End set Content for table data in [ td ] ===


            //=== Start append child  td  in table row ===
            tr_table_row.appendChild(td_type_current);
            tr_table_row.appendChild(td_type_name);
            tr_table_row.appendChild(td_type_amount);
            tr_table_row.appendChild(td_type_price);
             tr_table_row.appendChild(td_final_price);
             tr_table_row.appendChild(td_order_time);
            tr_table_row.appendChild(td_delete_type);


            tbody.insertBefore(tr_table_row,tbody.lastElementChild);
            // tbody.appendChild(tr_table_row);

            //=== End append child  td  in table row ===


            //===  set Ttem to local Storage
            if (!localStorage.getItem(this.getAttribute('data-typeName'))) {
                localStorage.setItem(this.getAttribute('data-typeName'), td_type_name.textContent);
                localStorage.setItem(this.getAttribute('data-typeId'), td_type_amount.textContent);
                localStorage.setItem(td_order_time, td_order_time.textContent);
            }

        }

    });




    // localStorage.clear();
















            // var    type_id       = $(this).attr('type_id'),
            //        type_name     = $(this).attr('type_name'),
            //        price_sale    = $(this).attr('price_sale'),
            //        _token        = this.parentElement.getAttribute('_token'),
            //        sales_table   = salesTable.getAttribute('id');

            //    console.log(" _token => " + _token + "  type_id => " + type_id + " type_name => " + type_name + " price_sale => " + price_sale) ;

            //    $.post('/add-to-orders',
            //    {
            //       '_token'       :  _token,
            //       'type_id'      : type_id,
            //       'type_amount'  : 1,
            //     //   'type_name'    : type_name,
            //       'type_price'   : price_sale,
            //       'sales_table'  : sales_table,
            //       'status' : 0
            //    },

            //    function(data ,status){
            //      if(data.status == true && status == "success"){
            //         //  data.request.type_price;
            //         let tr_table_row = document.createElement('tr'),
            //             td_current = document.createElement('td'),
            //             td_type_name = document.createElement('td'),
            //             td_type_amount = document.createElement('td'),
            //             td_type_price = document.createElement('td'),
            //             td_type_created_at = document.createElement('td');


            //              td_current.textContent  = 1,
            //              td_type_name.textContent        = data.request.type_id; //===  set type name
            //              td_type_amount.textContent      = data.request.type_amount; //===  set
            //              td_type_price.textContent       = data.request.type_price; //===  set

            //              td_type_created_at.textContent  =   new Date().getHours()    + ":" +
            //                                                  new Date().getMinutes()  + ":" +
            //                                                  new Date().getSeconds()  + " " +
            //                                                  new Date().getFullYear() + '-' +
            //                                                  new Date().getMonth()    + "-" +
            //                                                  new Date().getDate();
            //                                                //===  set

            //              tr_table_row.appendChild(td_current);
            //              tr_table_row.appendChild(td_type_name);
            //              tr_table_row.appendChild(td_type_amount);
            //              tr_table_row.appendChild(td_type_price);
            //              tr_table_row.appendChild(td_type_created_at);

            //             // tbody.insertBefore(tr_table_row,tbody.lastElementChild);
            //             tbody.appendChild(tr_table_row);

            //         //  $('.rowTable' + data.employee_id).remove();

            //      }

            //     });




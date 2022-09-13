<?php $__env->startSection("content"); ?>
<section>
  <table id="table_prizes" class="table caption-top mt-4">
    <caption>Se encontraron <span id="result_count">0</span> resultados.</caption>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Descripción</th>
        <th>Puntos</th>
        <th>Dinero</th>
        <th>Cantidad en stock</th>
        <th>Código de premio</th>
        <th>Calificación</th>
        <th>Vista previa</th>
      </tr>
    </thead>
    <tbody></tbody>
    <tfoot>
      <div id="pagination"></div>
    </tfoot>
  </table>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush("dynamic_script"); ?>
<script src="src/assets/jquery.twbsPagination.min.js"></script>
<script>
  
  /** FUNCIONES **/
  getCatalogs = () => {
    $.get("getCatalogs").done((data) => {
      // console.log("catalogs",data.catalogs);
      data.catalogs.filter(({flags}) => flags.enable).forEach((option) => {
        $("#get_catalogs").append(`<option value="${option.id}">${option.description}</option>`);
      });
    }).fail((fail) => {
        console.error(fail);
    });
  }
  getCategories = () => {
    $.get("getPrizesCategories").done((data) => {
      // console.log("prizes categories",data);
      data.prizes_categories.forEach((option) => {
        // logo = "";
        $("#get_prize_categories").append(`<option value="${option.id}">&emsp;${option.description}</option>`);
      });
    }).fail((fail) => {
        console.error(fail);
    });
  }
  getPrizes = (catalog = null,category = null) => {
    $.post("getPrizes", { catalog_id: catalog, category_id: category })
      .done((data) => {
        // console.log("prizes",data)
        $("#table_prizes tbody tr").remove();
        $("#result_count").text(data.prizes.PrizeList.filter(({flags}) => flags.enabled).length)
        if(data.prizes.PrizeList.length > 0) {
          data.prizes.PrizeList.filter(({flags}) => flags.enabled).forEach((row) => {
            src_image = (Object.prototype.hasOwnProperty.call(row,"pathImageAbsolute"))
              ? row.pathImageAbsolute : '';
            $("#table_prizes tbody")
              .append(`<tr>
                <td>${row.id}</td>
                <td>${row.name}</td>
                <td>${(row.description)? row.description : '<b>Sin descripción</b>'}</td>
                <td>${row.points}</td>
                <td>${row.money}</td>
                <td>${row.stock}</td>
                <td>${row.prizeCode}</td>
                <td>${row.avgQualification}</td>
                <td><img src="${src_image}" alt="${row.name}" width="50"></td>
              </tr>`);
          });
        } else {
          $("#table_prizes tbody").append("<tr><td colspan=\"9\">No se encontró ningún resultado</td></tr>")
        }
    }).fail((fail) => {
        console.error(fail);
    });
  }
  // function apply_pagination(total_pagess) {
  //   catalog = null,
  //   category = null,
  //   init_limit = 0,
  //   row_count = 20
  //   $("#pagination").twbsPagination({
  //     totalPages: total_pages,
  //     visiblePages: 5,
  //     onPageClick: function (event, page) {
  //       //  displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
  //       //  endRec = (displayRecordsIndex) + recPerPage;
  //       //  displayRecords = records.slice(displayRecordsIndex, endRec);
  //       // generate table
  //       catalog_value = $("#get_catalogs").val();
  //       category_value = $("#get_prize_categories").val();
  //       getPrizes(catalog_value,category_value,init_limit,row_count);
  //     }
  //   });
  // }
  /** ONLOAD */
  $(document).ready(() => {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 7000,
      values: [ 0, 500 ],
      slide: function( event, ui ) {
        $("#amount").val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    // Llenar todos los catálogos in the select
    getCatalogs();
    // Llenar todos las categorías de precios in the select
    getCategories();
    // Llenar todos los getPrizes in the grid
    getPrizes();
    // apply_pagination();
  });
  /** EVENTS */
  $("#get_catalogs").on("change", function() {
    $("#get_prize_categories").val("");
    catalog_value = $(this).val();
    category_value = $("#get_prize_categories").val();
    getPrizes(catalog_value,category_value);
  })
  $("#get_prize_categories").on("change", function() {
    catalog_value = $("#get_catalogs").val();
    category_value = $(this).val();
    getPrizes(catalog_value,category_value);
  })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make("layout", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $(".sidebar-wrapper ul li.nav-item").click(function () {
        if ($(this).attr("id") != "") {
            var valorId = $(this).attr("id");
            activeItemSidebar(valorId);
            $("#containerLoadInformations").empty();
            $("#containerLoadInformations").load("load/" + valorId + ".php");
        }
    });

    function activeItemSidebar(valorId) {
        $(".sidebar-wrapper ul li.nav-item").each(function () {
            $(this).removeClass("active");
        });
        $(".sidebar-wrapper ul li.nav-item#" + valorId).addClass("active");
    }

    $(".sidebar-wrapper ul li.nav-item#paginaInicial").trigger("click");
});


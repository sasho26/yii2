// let item_table_start;
// $(function() {
//     $(".draggable").draggable({
//         stop: function (event, ui) {
//             "use strict";
//             let position;
//
//             let table_width;
//             let item_table_width;
//             let row;
//             let status;
//             let id;
//             position = ui.position.left;
//             let table = $(".table-container");
//             let itemtable = $(".item-table")    ;
//             item_table_start = itemtable.position()['left'];
//             table_width = table.width();
//             item_table_width = itemtable.width();
//             row = table_width / 3;
//             status = parseInt(position / item_table_width);
//             id = $(event.initDragEvent).data('id');
//             let positions = {"-1": -item_table_width, "0": 0, "1": item_table_width};
//             this.css({left: positions[status.toString()]});
//             //this.setPosition(positions[status.toString()]);
//             console.log(status);
//         }
//     });
//
// });
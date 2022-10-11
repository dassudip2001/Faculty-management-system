// $(document).ready(function(){
//   let row_number = {{ count(old('budget_id', [''])) }};
//   $("#add_row").click(function(e){
//     e.preventDefault();
//     let new_row_number = row_number - 1;
//     $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
//     $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
//     row_number++;
//   });

//   $("#delete_row").click(function(e){
//     e.preventDefault();
//     if(row_number > 1){
//       $("#product" + (row_number - 1)).html('');
//       row_number--;
//     }
//   });
// });

// //calculation
// function findTotal() {

//   var arr = document.getElementsByName('budget_details_amount[]');
//   var tot = 0;
//   //button
//   var Amount = document.getElementById('amount').value;
//   var button = document.querySelector("#submit");
//     //setting button state to disabled
//   //button complete
//   for (var i = 0; i < arr.length; i++) {
//       if (parseInt(arr[i].value))
//           tot += parseInt(arr[i].value);
//       console.log(tot);
//   }
//   document.getElementById('grandTotal').value = tot;
//   console.log(tot);
//   if (tot==Amount){
//        alert('Equal To The Grand Total ');
//       add_row.disabled=true;
//       button.disabled = false;
//     $('#budgetForm').submit();
//   }
//   else{
//       button.disabled = true;
//       alert('Somethings Went Wrong ');
//   }

// }

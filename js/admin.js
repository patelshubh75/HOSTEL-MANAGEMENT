// ================= ADMIN JS =================


// Delete Confirmation

function deleteRecord(){

let result = confirm("Are you sure you want to delete this record?");


if(result){

alert("Record Deleted Successfully");

}

}




// Logout Function

function adminLogout(){

let check = confirm("Do you want to logout?");


if(check){

window.location.href="../index.php";

}

}
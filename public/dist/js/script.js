function previewProfileImage(event){
    const input=event.target;
    if(input.files && input.files[0]){
        const reader=new FileReader();
        reader.onload = function(e){
            document.getElementById('current-profile-image').src=e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}


function openProfileImageDialog() {
    document.getElementById('profile-image-dialog').style.display = 'block';
}

function closeProfileImageDialog() {
    document.getElementById('profile-image-dialog').style.display = 'none';
}
editForm();
function editForm(){
    document.getElementById('profile-edit-dialog').style.display='block';
}
function closeProfileDialog(){
    document.getElementById('profile-edit-dialog').style.display='none';

}

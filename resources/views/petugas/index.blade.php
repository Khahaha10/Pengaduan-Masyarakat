<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}" alt="ikon">
</head>




<body>
    <div class="container-fluid flex-container">
        @include('petugas.sidebar')
        @include('petugas.konten')    
    </div>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const showRepliesButtons = document.querySelectorAll('.show-replies-btn');
            showRepliesButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const forumId = button.getAttribute('data-forum-id');
                    const repliesContainer = document.getElementById(`replies-${forumId}`);

                    if (repliesContainer.style.display === "none" || repliesContainer.style.display === "") {
                        repliesContainer.style.display = "block";
                        button.innerText = "Hide Replies";
                    } else {
                        repliesContainer.style.display = "none";
                        button.innerText = "Show Replies";
                    }
                });
            });
            
        });

        document.addEventListener('DOMContentLoaded', function() {
            const floatingMessages = document.querySelectorAll('.floating-message');
            floatingMessages.forEach(function(message) {
                setTimeout(() => {
                    message.style.transition = 'opacity 0.5s ease';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500);
                }, 3000);
            });
        });

    </script>
    
    
</body>

</html>

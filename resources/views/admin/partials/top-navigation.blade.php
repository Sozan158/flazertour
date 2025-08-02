<body class="navi">



    <ul class="top-navigation">
        <img class = "logo1" src="{{ asset('clients/img/flazerlogo1.png') }}" alt="Flazer Tour" width="200"
            height="auto">

        <li class="active">
            <a href="#">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>

                <span class="text">Bảng điều khiển</span>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="people-outline"></ion-icon></span>

                <span class="text">Quản lý User</span>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="airplane-outline"></ion-icon></span>

                <span class="text">Quản lý Tour</span>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>

                <span class="text">Quản lý đơn đặt</span>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>

                <span class="text">Cài đặt</span>
        </li>

        <a href="#" style="margin-left:100px ; position: relative;">
            <div class="search-box" id="searchBox">
                <input type="text" placeholder="Tìm kiếm..." id="searchInput">
                <span class="icon" id="searchIcon"><ion-icon name="search-outline"></ion-icon></span>

            </div>
        </a>


        <a href="#" style="margin-left:50px">
            {{-- <span class="icon"><ion-icon name="settings-outline"></ion-icon></span> --}}
            <img src="{{ asset('clients/img/user.jpg') }}">
            <h3 style="">User</h3>


    </ul>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        let list = document.querySelectorAll('.top-navigation li');

        function activeLink() {
            list.forEach((item) => {
                item.classList.remove('active');
            });
            this.classList.add('active');
        }

        list.forEach((item) =>
            item.addEventListener('click', activeLink)
        );
    </script>

    <script>
        const searchBox = document.getElementById('searchBox');
        const searchIcon = document.getElementById('searchIcon');
        const searchInput = document.getElementById('searchInput');

        searchIcon.addEventListener('click', () => {
            searchBox.classList.toggle('expanded');
            searchInput.focus();
        });

        // Optional: Ấn ra ngoài thì thu gọn lại
        document.addEventListener('click', (e) => {
            if (!searchBox.contains(e.target)) {
                searchBox.classList.remove('expanded');
            }
        });
    </script>
</body>

 @include('clients.blocks.header');
 <div class="profile-container">
     <aside class="sidebar">
         <nav class="nav">
             <ul>
                 <li class="active" data-tab="tab-profile"><a href="#"><i class="fas fa-user"></i></a></li>
                 <li data-tab="tab-password"><a href="#"><i class="fas fa-lock"></i></a></li>
                 <li data-tab="tab-notification"><a href="#"><i class="fas fa-bell"></i></a></li>
                 <li data-tab="tab-cart"><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
             </ul>
         </nav>
     </aside>
     <main class="main-content">
         <header>
             <h1 id="tab-title">Thông tin cá nhân</h1>
             <hr class='mb-25'>
         </header>
         <form class="profile-form content-tab" id ="tab-profile">
             <div class="form-and-avatar">
                 <div class="form-fields">
                     <div class="form-group">
                         <label for="username">TÊN NGƯỜI DÙNG</label>
                         <input type="text" id="fullname" placeholder="Họ và tên" value="">

                     </div>
                     <div class="form-group">
                         <label for="email">E-MAIL</label>
                         <input type="email" name="email" value="{{ $user->email }}">
                     </div>

                     <div class="form-group">
                         <label for="username">NGÀY SINH</label>
                         <input type="date" id="birthday" value="">
                     </div>
                     <div class="form-group">
                         <label for="location">ĐỊA CHỈ</label>
                         <input type="text" id="location" placeholder="Địa Chỉ" value="{{ $user->address }}">
                     </div>
                     <div class="form-group">
                         <label for="phone">SỐ ĐIỆN THOẠI</label>
                         <input type="tel" id="phone" placeholder="Số điện thoại"value="{{ $user->phone }}">
                     </div>
                     <div class="form-group">
                         <label for="phone">THÔNG TIN XUẤT HOÁ ĐƠN ĐIỆN TỬ</label>
                         <input type="text" id="invoice" placeholder="">
                     </div>
                 </div>
                 <div class="avatar-section">
                     <div class="avatar">
                         <h4>Ảnh đại diện</h4>
                         <img src="{{ asset('clients/img/flazerlogo1.png') }}" alt="Ảnh đại diện">
                         <button type="submit" class="camera-icon"><i class="fas fa-camera"></i></button>
                     </div>
                 </div>
             </div>
             <div class="form-actions">
                 <button type="submit" class="save-btn">LƯU</button>
             </div>
         </form>

         <form class="change-pass-form content-tab" id ="tab-password" style="display: none;">
             <div class="form-and-avatar">
                 <div class="form-fields">
                     <div class="form-group">
                         <label for="oldPass">Mật khẩu hiện tại</label>
                         <input type="password" id="old_password" name="old_password">
                     </div>

                     <div class="form-group">
                         <label for="newPass">Mật khẩu mới</label>
                         <input type="password" id="new_password" name="new_password">
                     </div>

                     <div class="form-group">
                         <label for="confirmPass">Xác nhận mật khẩu</label>
                         <input type="password" id="conf_password" name="conf_password">
                     </div>
                 </div>
             </div>

             <div class="form-actions">
                 <button type="submit" class="save-btn">Cập nhật mật khẩu</button>
             </div>

         </form>

         <div class="notif-form content-tab" id ="tab-notification" style="display: none;">
             <p>Hiện không có thông báo nào</p>

         </div>

         <div class="cart-form content-tab" id ="tab-cart" style="display: none;">
             <p>Đơn hàng của bạn</p>

         </div>
     </main>
 </div>
 <script src="{{ asset('clients/js/navi.js') }}"></script>

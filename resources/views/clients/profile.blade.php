 @include('clients.blocks.header');
 @include('components.toast')



 {{-- <div id="successMessage" style="display:flex;position: fixed; color: green; margin: 80px; ">Cập
     nhật thành công!</div>
 <div id="msgBox" style="display:none">Cập nhật thành công!</div> --}}
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
             <hr class='mb-25' style="border: solid 3px navy; margin-bottom: 40px; ">
         </header>
         <form action="{{ route('user-profile') }}" method="POST" enctype="multipart/form-data" name="updateUser"
             class="updateUser" id="avatarForm" data-url="{{ route('user-profile') }}">
             @csrf
             <div class="profile-form
             content-tab" id ="tab-profile">
                 <div class="form-and-avatar">
                     <div class="form-fields">
                         <div class="form-group">
                             <label>TÊN NGƯỜI DÙNG</label>
                             <input type="text" id="fullname" name = "fullname" placeholder="Họ và tên"
                                 value="{{ $user->fullname }}">

                         </div>
                         <div class="form-group">
                             <label>E-MAIL</label>
                             <input type="email" id ="email" name="email" value="{{ $user->email }}">
                         </div>

                         <div class="form-group">
                             <label>NGÀY SINH</label>
                             <input type="date" id="birthday" value="">
                         </div>
                         <div class="form-group">
                             <label>ĐỊA CHỈ</label>
                             <input type="text" id="address" name="address" placeholder="Địa Chỉ"
                                 value="{{ $user->address }}">
                         </div>
                         <div class="form-group">
                             <label>SỐ ĐIỆN THOẠI</label>
                             <input type="tel" id="phone" name="phone"
                                 placeholder="Số điện thoại"value="{{ $user->phone }}">
                         </div>
                         <div class="form-group">
                             <label>THÔNG TIN XUẤT HOÁ ĐƠN ĐIỆN TỬ</label>
                             <input type="text" id="invoice" placeholder="">
                         </div>
                     </div>

                     <div class="avatar-section">
                         <div class="avatar">
                             <h4>Ảnh đại diện</h4>
                             <label for="avtInput">
                                 <img src="{{ asset('clients/img/profile/' . $user->avatar) }}" alt="Ảnh đại diện"
                                     id="preview" style="cursor:pointer; width: 150px;">
                             </label>
                             <input type="file" id="avtInput" name="avatar" accept="image/*" style="display:none">
                             <button type="button" class="camera-icon"><i class="fas fa-camera"></i></button>
                         </div>

                     </div>
                 </div>
                 <div class="form-actions">
                     <button type="submit" class="btn-save">Lưu thông tin</button>
                 </div>
             </div>
         </form>



         <div class="invalid" style="margin-top: -15px; position: absolute;" id= "alertPassword">
         </div>

         <form action="{{ route('user-password') }}" method="POST" name="changePass" class="changePassword"
             data-url="{{ route('user-password') }}">
             @csrf
             <div class ="change-pass-form
             content-tab" id ="tab-password" style="display: none;">

                 <div class="form-and-avatar">
                     <div class="form-fields">

                         <div class="form-group">
                             <label>MẬT KHẨU HIỆN TẠI</label>
                             <input type="password" id="old_password" name="old_password">
                         </div>

                         <div class="form-group">
                             <label>MẬT KHẨU MỚI</label>
                             <input type="password" id="new_password" name="new_password">
                         </div>

                         <div class="form-group">
                             <label>XÁC NHẬN MẬT KHẨU</label>
                             <input type="password" id="confirm_password" name="conf_password">
                         </div>
                     </div>
                 </div>

                 <div class="form-actions">
                     <button type="submit">Cập nhật mật khẩu</button>
                 </div>

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



 <script src="{{ asset('clients/js/auth.js') }}"></script>
 <script src="{{ asset('clients/js/navi.js') }}"></script>

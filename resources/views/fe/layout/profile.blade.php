<div class="page-content page-container show1" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12 ">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile px-4">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="{{asset(Auth::user()->avatar)}}" style="width: 100px;height: 100px;object-fit: cover;" class="img-radius"
                                        alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600 " style="color: #fff">{{ Auth::user()->name }}</h6>
                                <p style="color: #fff; margin-bottom:10px;">Web Designer</p>
                                <div data-toggle="modal" data-target="#ModaleditProfile">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0"
                                    viewBox="0 0 512 512" style="enable-background:new 0 0 20 20" xml:space="preserve"
                                    class="">
                                    <g>
                                        <path
                                            d="M358.9 298.4 273.3 384c-4.6 4.6-7.7 10.8-8.5 17.3l-6.9 52c-.6 4.8-.1 9.5 1.5 14h-212c-27.1 0-46.4-26.4-38.1-52.2l32.9-102.8c10.6-33 46.7-50.1 78.9-37.6 21.4 8.3 48.9 14.8 82.6 14.8s61.2-6.5 82.6-14.8c27.4-10.7 57.6 0 72.6 23.7z"
                                            fill="#ffffff" opacity="1" data-original="#000000" class="iconsgv">
                                        </path>
                                        <circle cx="203.8" cy="147.9" r="103.1" fill="#ffffff" opacity="1"
                                            data-original="#000000" class="iconsgv"></circle>
                                        <path
                                            d="M462 342 346.6 457.4c-1.5 1.5-3.6 2.5-5.8 2.8l-52 6.9c-6.5.9-12.1-4.7-11.2-11.2l6.9-52c.3-2.2 1.3-4.2 2.8-5.8l115.4-115.4zM497.3 306.7l-14.7 14.7-59.2-59.2 14.7-14.7c9.8-9.8 25.6-9.8 35.3 0l23.9 23.9c9.7 9.7 9.7 25.5 0 35.3z"
                                            fill="#ffffff" opacity="1" data-original="#000000" class="iconsgv">
                                        </path>
                                    </g>
                                </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 ">
                            <div class="card-block">
                                <div class="remove" onclick="removeProfile()">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" x="0" y="0"
                                    viewBox="0 0 491.5 491.5" style="enable-background:new 0 0 20 20"
                                    xml:space="preserve" class="">
                                    <g>
                                        <path fill-rule="evenodd"
                                            d="m460.8 79.5-48.7-48.8L245.8 197 79.5 30.7 30.7 79.5 197 245.8 30.7 412.1l48.8 48.7 166.3-166.3 166.3 166.3 48.7-48.7-166.3-166.3z"
                                            clip-rule="evenodd" fill="#000000" opacity="1" data-original="#000000">
                                        </path>
                                    </g>
                                    </svg>
                                </div>
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông tin cá nhân</h6>
                                <div class="row">
                                    <div class="col-sm-6 px-4">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                    </div>
                                    <div class="col-sm-6 px-4">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{ Auth::user()->phone }}</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                <div class="row">
                                    <div class="col-sm-6 px-4">
                                        <p class="m-b-10 f-w-600">Recent</p>
                                        <h6 class="text-muted f-w-400">Sam Disuja</h6>
                                    </div>
                                    <div class="col-sm-6 px-4">
                                        <p class="m-b-10 f-w-600">Most Viewed</p>
                                        <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li>
                                        <a href="#!" data-toggle="tooltip" data-placement="bottom" data-abc="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20"
                                                x="0" y="0" viewBox="0 0 100 100"
                                                style="enable-background:new 0 0 20 20" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path fill="#3d6ad6"
                                                        d="M40.437 55.166c-.314 0-6.901.002-9.939-.001-1.564-.001-2.122-.563-2.122-2.137a9807.51 9807.51 0 0 1 0-12.129c.001-1.554.591-2.147 2.135-2.148 3.038-.002 9.589-.001 9.926-.001v-8.802c.002-3.974.711-7.778 2.73-11.261 2.067-3.565 5.075-6.007 8.93-7.419 2.469-.905 5.032-1.266 7.652-1.268 3.278-.002 6.556.001 9.835.007 1.409.002 2.034.625 2.037 2.044.006 3.803.006 7.606 0 11.408-.002 1.434-.601 2.01-2.042 2.026-2.687.029-5.376.011-8.06.119-2.711 0-4.137 1.324-4.137 4.13-.065 2.968-.027 5.939-.027 9.015.254 0 7.969-.001 11.575 0 1.638 0 2.198.563 2.198 2.21 0 4.021-.001 8.043-.004 12.064-.001 1.623-.527 2.141-2.175 2.142-3.606.002-11.291.001-11.627.001v32.545c0 1.735-.546 2.288-2.258 2.288H42.541c-1.513 0-2.103-.588-2.103-2.101l-.001-32.732z"
                                                        opacity="1" data-original="#3d6ad6" class=""></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!" data-toggle="tooltip" data-placement="bottom" data-abc="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17"
                                                x="0" y="0" viewBox="0 0 1226.37 1226.37"
                                                style="enable-background:new 0 0 20 20" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="M727.348 519.284 1174.075 0h-105.86L680.322 450.887 370.513 0H13.185l468.492 681.821L13.185 1226.37h105.866l409.625-476.152 327.181 476.152h357.328L727.322 519.284zM582.35 687.828l-47.468-67.894-377.686-540.24H319.8l304.797 435.991 47.468 67.894 396.2 566.721H905.661L582.35 687.854z"
                                                        fill="#007bff" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!" data-toggle="tooltip" data-placement="bottom"
                                            data-abc="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                height="20" x="0" y="0" viewBox="0 0 511 511.9"
                                                style="enable-background:new 0 0 20 20" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="M510.95 150.5c-1.2-27.2-5.598-45.898-11.9-62.102-6.5-17.199-16.5-32.597-29.6-45.398-12.802-13-28.302-23.102-45.302-29.5-16.296-6.3-34.898-10.7-62.097-11.898C334.648.3 325.949 0 256.449 0s-78.199.3-105.5 1.5c-27.199 1.2-45.898 5.602-62.097 11.898-17.204 6.5-32.602 16.5-45.403 29.602-13 12.8-23.097 28.3-29.5 45.3-6.3 16.302-10.699 34.9-11.898 62.098C.75 177.801.449 186.5.449 256s.301 78.2 1.5 105.5c1.2 27.2 5.602 45.898 11.903 62.102 6.5 17.199 16.597 32.597 29.597 45.398 12.801 13 28.301 23.102 45.301 29.5 16.3 6.3 34.898 10.7 62.102 11.898 27.296 1.204 36 1.5 105.5 1.5s78.199-.296 105.5-1.5c27.199-1.199 45.898-5.597 62.097-11.898a130.934 130.934 0 0 0 74.903-74.898c6.296-16.301 10.699-34.903 11.898-62.102 1.2-27.3 1.5-36 1.5-105.5s-.102-78.2-1.3-105.5zm-46.098 209c-1.102 25-5.301 38.5-8.801 47.5-8.602 22.3-26.301 40-48.602 48.602-9 3.5-22.597 7.699-47.5 8.796-27 1.204-35.097 1.5-103.398 1.5s-76.5-.296-103.403-1.5c-25-1.097-38.5-5.296-47.5-8.796C94.551 451.5 84.45 445 76.25 436.5c-8.5-8.3-15-18.3-19.102-29.398-3.5-9-7.699-22.602-8.796-47.5-1.204-27-1.5-35.102-1.5-103.403s.296-76.5 1.5-103.398c1.097-25 5.296-38.5 8.796-47.5C61.25 94.199 67.75 84.1 76.352 75.898c8.296-8.5 18.296-15 29.398-19.097 9-3.5 22.602-7.7 47.5-8.801 27-1.2 35.102-1.5 103.398-1.5 68.403 0 76.5.3 103.403 1.5 25 1.102 38.5 5.3 47.5 8.8 11.097 4.098 21.199 10.598 29.398 19.098 8.5 8.301 15 18.301 19.102 29.403 3.5 9 7.699 22.597 8.8 47.5 1.2 27 1.5 35.097 1.5 103.398s-.3 76.301-1.5 103.301zm0 0"
                                                        fill="#007bff" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                    <path
                                                        d="M256.45 124.5c-72.598 0-131.5 58.898-131.5 131.5s58.902 131.5 131.5 131.5c72.6 0 131.5-58.898 131.5-131.5s-58.9-131.5-131.5-131.5zm0 216.8c-47.098 0-85.302-38.198-85.302-85.3s38.204-85.3 85.301-85.3c47.102 0 85.301 38.198 85.301 85.3s-38.2 85.3-85.3 85.3zM423.852 119.3c0 16.954-13.747 30.7-30.704 30.7-16.953 0-30.699-13.746-30.699-30.7 0-16.956 13.746-30.698 30.7-30.698 16.956 0 30.703 13.742 30.703 30.699zm0 0"
                                                        fill="#007bff" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade profile-modal"  id="ModaleditProfile" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('profile.user')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <legend>Sửa thông tin Tài Khoản</legend>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    </div>
                    <div class="form-group" for="image-upload">
                        <div class="profile-pic">
                            <label class="-label" for="file">
                              <span class="glyphicon glyphicon-camera"></span>
                              <span>Change Image</span>
                            </label>
                            <input id="file" type="file" name="image" onchange="loadFile(event)" value="select"/>
                            <img src="{{Auth::user()->avatar}}" id="output" width="200" />
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tên</label> <span id="errorname"></span>
                        <input type="text" class="form-control" id="ename" name="name" value="{{Auth::user()->name}}" onblur="checkname()" ;
                            Required />
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label> <span id="errorurl"></span>
                        <input type="email" class="form-control" id="eemal" name="email" value="{{Auth::user()->email}}" onblur="checkemail()" ;
                            Required />
                    </div>
                    <div class="form-group">
                        <label for="">Phone:</label> <span id="errorurl"></span>
                        <input type="number" class="form-control" id="ephone" name="phone" value="{{Auth::user()->phone}}" onblur="checkphone()" ;
                            Required />
                    </div>
                    <div>
                    <a href="#" style="font-size: 15px">Thay đổi mật khẩu</a>
                    <span id="errorurl"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn2 btn-thoat" data-dismiss="modal">Đóng</button>
                    <button onclick="editProfile({{Auth::user()->id}})" type="submit" name="insert" class="btn2 btn-sua">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>


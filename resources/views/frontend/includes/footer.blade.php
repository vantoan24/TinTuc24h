<div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Liên kết hữu ích</h3>
                            <ul>
                                <li><a href="https://vi.wikipedia.org/wiki/Th%E1%BB%83_lo%E1%BA%A1i:B%C3%A1o_ch%C3%AD_Vi%E1%BB%87t_Nam">Tên và tên</a></li>
                                <li><a href="https://tr-ex.me/d%E1%BB%8Bch/ti%E1%BA%BFng+vi%E1%BB%87t-ti%E1%BA%BFng+anh/%C4%91%E1%BA%BFn+l%C3%BAc+r%E1%BB%93i#gref">Đến lúc rồi</a></li>
                                <li><a href="https://dautunhatnam.com.vn/goi-dau-tu/?gclid=Cj0KCQjwkruVBhCHARIsACVIiOxAcmio-SVDxOZmXuTk1yd381KK_TpJkWdUb3jnFIVGKYX-BCXsYPcaAtIUEALw_wcB">Chọn đầu tư</a></li>
                                <li><a href="https://ketoananpha.vn/khac-nhau-giua-chi-nhanh-va-van-phong-dai-dien.html">Không có văn phòng nào</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Đường dẫn nhanh</h3>
                            <ul>
                                <li><a href="https://tapchicongsan.org.vn/web/guest/the-gioi-van-de-su-kien/-/2018/824364/the-gioi-truoc-thach-thuc-doi-ngheo.aspx">Đối mặt với nghèo đói</a></li>
                                <li><a href="https://chamsocsuckhoe.yte360.com/landingpage">Chăm sóc sức khỏe</a></li>
                                <li><a href="/home">Không có tang</a></li>
                                <li><a href="https://text.123docz.net/document/6354091-bai-tap-mon-lao-dong-nha-bao.htm">Bài tập về nhà</a></li>
                                <li><a href="https://chiakhoaphapluat.vn/yeu-to-cua-bao-cao-tai-chinh/">Yếu tố</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Liên lạc</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Thôn 2, Triệu Lăng, Triệu Phong, Tĩnh Quảng Trị</p>
                                <p><i class="fa fa-envelope"></i>votuant2@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+84 777 333 274</p>
                                <div class="social">
                                    <a href="https://twitter.com/?lang=vi"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">ĐĂNG KÝ NHẬN THÔNG TIN</h3>
                            <div class="newsletter">
                                <p>
                                    Đăng ký để nhận thông tin , bài viết mới từ New 24h
                                </p>
                                <form>
                                    <input class="form-control add" type="email" placeholder="Nhập Email của quý khách">
                                    <div id="success"></div>
                                    <div>
                                    </div>
                                </div>
                                <input class="btn btn-dark register" style="background:#2168ea" id="text" type="button" value="Đăng ký">
                                <button class="btn btn-dark" style="background:#28A745;display:none;width: 94px" disabled id="check"><i class="fa fa-check"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">


                $('.register').click(function(){

                    var email = $('.add').val();
                    var regex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/

                    if(regex.test(email)){
                        $.ajax({
                            url:"{{url('/addNewsleters')}}",
                            method:"POST",
                            headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             },
                            data:{
                                email:email,
                            },
                            success:function(status,data){
                                console.log(status);
                                $('.add').val('Quý khách đã đăng ký email thành công').css({"color": "#49d084d1", "font-size": "85%"});
                                $('#check').show();
                                $('#text').hide();
                                $('#success').hide();
                            },

                        });
                    }else{
                        $('#success').html('<span class="text text-danger">Sai định dạng email </span>')
                    }
                });

        </script>

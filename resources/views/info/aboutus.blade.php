@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Giới thiệu</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bor">
                    <img src="{{ asset('img/Banner.jpg') }}" alt="" style="margin-bottom: 20px">
                    <section class="box-main1" style="border: 1px solid #ccc;
    padding: 20px;">
                        <div class="page-wrapper">
                            <div class="heading-page">
                                <h1>Giới thiệu ShoesShop</h1>
                            </div>
                            <div class="wrapbox-content-page">
                                <div class="content-page ">
                                    <p><b>ShoesShop </b><span>là trang thương mại điện tử chuyên cung cấp và bán lẻ các sản phẩm </span><b>giày thời trang cao cấp, giày thể thao hàng hiệu</b><span> hàng đầu tại Việt Nam.&nbsp;</span></p><p><b>ShoesShop</b><span> ra đời với sứ mệnh: Đem cả thế giới giày hàng hiệu đến ngôi nhà của bạn chỉ trong vài cái click chuột. Đơn giản - Nhanh chóng và Siêu Tiện lợi.&nbsp;</span></p><p><span>Mục tiêu về chiến lược: </span><b>ShoesShop </b><span>phấn đấu trở thành một sàn thương mại điện tử về </span><b>giày thể thao</b> <b>cao cấp</b><span> hàng đầu Việt Nam và vươn xa ra thị trường thế giới, góp phần tạo nên chất lượng và trải nghiệm tốt nhất cho người Việt với giá cả phải chăng.</span></p><p><b>ShoesShop </b><span>hứa hẹn mang đến cho các khách hàng thân yêu những đôi </span><b>giày thể thao</b><span> thời thượng xịn xò, trẻ trung, năng động và cá tính từ những thương hiệu danh tiếng trên thế giới như: </span><b>Nike</b><span>, </span><b>Adidas, Gucci</b><span>, </span><b>Fila, Puma, Converse</b><span>...&nbsp;</span></p><p><span>Tất cả những gì bạn cần làm là nhấp chuột đặt hàng và </span><b>ShoesShop </b><span>sẽ hoàn thành phần còn lại để những đôi </span><b>giày cao cấp hàng hiệu</b><span> được chuyển đến tận tay khách hàng với trải nghiệm tuyệt vời mà đội ngũ </span><b>ShoesShop</b><span> đã nỗ lực không ngừng nghỉ vì những khách hàng thân yêu của mình.</span></p><p><span>Đội ngũ ShoesShop!</span></p>
                                </div>
                            </div>
                        </div>
			<hr />
                        <div class="page-wrapper">
                            <div class="heading-page">
                                <h1>Câu hỏi thường gặp</h1>
                            </div>
                            <div class="wrapbox-content-page">
                                <div class="content-page ">
                                    <div class="clearfix description-page"><div><strong><span>I. GIAO HÀNG, VẬN CHUYỂN</span></strong></div><div><strong>1. Nếu tôi đặt hàng từ ShoesShop online, tôi có được giao hàng tận nơi không?</strong></div><div>Nếu đặt hàng ShoesShop online bạn sẽ được giao hàng trực tiếp tận nơi.</div><div><strong>2. Tôi phải trả phí vận chuyển như thế nào?</strong></div><div>Khách hàng sẽ được miễn phí 100% cước vận chuyển trong nước với tất cả các đơn hàng.</div><div><strong>3. Tôi ở Tỉnh, tôi sẽ nhận hàng trong thời gian bao lâu?</strong></div><div>Ở tỉnh bạn sẽ được nhận hàng trong vòng 4 - 5 ngày (tính theo ngày làm việc) kể từ ngày xác nhận đơn hàng.</div><div><strong>4. Nếu trả lại sản phẩm ai sẽ là người chịu phí vận chuyển?</strong></div><div>Khách hàng sẽ chịu phí vận chuyển khi chuyển hoàn sản phẩm về cho ShoesShop.</div><div><strong>5. Tôi có thể nhận bưu kiện tại địa chỉ công ty tôi làm việc được không?</strong></div><div>Vâng, bưu kiện của bạn có thể gửi đến địa chỉ văn phòng. Xin vui lòng nhập địa chỉ và tên họ đầy đủ của quý khách khi đặt hàng.</div><div><strong>6. Tôi có thể nhận được lịch giao hàng như thế nào?</strong></div><div>Khách hàng sẽ được bộ phận đặt hàng liên hệ trực tiếp để thông báo lịch giao hàng.</div><div><span><strong>II. HOÀN TRẢ, ĐỔI SẢN PHẨM</strong></span></div><div><strong>1. Quy đinh hoàn trả và đổi sản phẩm của ShoesShop như thế nào?</strong></div><div>Bạn hãy tham khảo chính sách đổi trả sản phẩm của ShoesShop, để được cung cấp thông tin đầy đủ và chi tiết nhất.</div><div><strong>2. Tôi sẽ nhận lại sản phẩm đổi trong thời gian bao lâu?</strong></div><div>Bạn hãy tham khảo trang thanh toán giao nhận của ShoesShop, để được cung cấp thông tin đầy đủ và chi tiết nhất.&nbsp;</div><div><strong>3. &nbsp;Nếu đổi trả tôi không mang theo hoá đơn và phiếu thông tin sản phẩm thì có được đổi không?</strong></div><div>Trường hợp, khách hàng không có hóa đơn hoặc phiếu thông tin sản phẩm thì phải chứng minh ngày mua và nhân viên sẽ đối soát lại với hệ thống để hỗ trợ khách hàng nhanh nhất.</div><div><strong>4. Lỗi như thế nào mới được gọi là lỗi về chất lượng sản phẩm</strong></div><div><em>Đối với giày dép:&nbsp;</em></div><div>Lỗi chất lượng sản phẩm như: Gót không vững (bị lắc); Bong si, tróc si (lão si). Một số trường hợp khác ShoesShop sẽ kiểm tra nguyên nhân trước khi giải quyết.</div><div><em></em><br></div><div><strong>5. &nbsp;Có được đổi sản phẩm mới hoặc hoàn trả tiền không?</strong></div><div>Quý khách sẽ được đổi trả và hoàn tiền trong mọi trường hợp.</div><div><strong>6. Làm thế nào để được đổi hàng?&nbsp;</strong></div><div>Bạn hãy tham khảo chính sách đổi trả hàng của&nbsp;ShoesShop.</div><div><strong>7. &nbsp;Có phải tính phí vận chuyển khi đổi trả sản phẩm?</strong></div><div>Khách hàng sẽ chịu phí vận chuyển khi gửi trả sản phẩm hoàn về cho ShoesShop.</div><div><strong>8. &nbsp;Tôi muốn đổi hàng vì size, màu sắc không đúng có được không?</strong></div><div>Khách hàng được đổi - trả với bất kì lý do gì trong thời gian đổi trả 90 ngày cho sản phẩm giày dép, 30 ngày cho túi và phụ kiện.</div><div><strong>9. Tôi đã đặt hàng, giờ muốn huỷ đơn hàng phải làm sao?</strong><br><strong></strong></div><div>Quý khách vui lòng liên hệ ShoesShop qua số 0528152815, chúng tôi sẽ hủy đơn hàng cho qúy khách.</div><div><br><strong></strong></div><div><span><strong>III. ĐẶT HÀNG VÀ THANH TOÁN</strong></span></div><div><strong>1. &nbsp;Tôi có thể hủy đặt hàng khi chưa nhận được sản phẩm không?</strong></div><div>Khách hàng có thể huỷ đặt hàng khi chưa nhận được sản phẩm ngay cả khi đơn hàng đã được giao cho đơn vị vận chuyển.</div><div><strong>2. &nbsp;Khi đặt hàng, tôi phải thanh toán như thế nào?</strong></div><div>Khách hàng sẽ nhận hàng, nhân viên bưu điện sẽ thu tiền trực tiếp từ khách hàng.</div><div><strong>3. &nbsp;Nếu tôi mua sản phẩm với số lượng nhiều thì giá có được giảm không?</strong></div><div>Khi mua hàng với số lượng nhiều khách hàng sẽ được hưởng chế độ ưu đãi, giảm giá ngay tại thời điểm mua hàng.</div><div><strong>4. &nbsp;Làm thế nào để đặt hàng ShoesShop?</strong></div><div>Rất đơn giản, bạn hãy truy cập trang ShoesShop.VN để đặt hàng hoặc gửi email: ShoesShop@gmail.com, gọi điện thoại số: 0528152815 để đặt sản phẩm.</div><div><strong>5. &nbsp;Làm sao để biết sản phẩm còn hàng hay hết hàng?</strong></div><div>Trên website ShoesShop sẽ cung cấp thông tin sản phẩm đang còn hàng hoặc hết hàng cho khách hàng tham khảo.</div><div><strong>6. &nbsp;Đặt hàng trực tuyến có những rủi ro gì không?</strong></div><div>Với ShoesShop, khách hàng không phải lo lắng, vì chúng tôi cung cấp sản phẩm chất lượng tốt, giá cả phải chăng. Đặc biệt, khách hàng sẽ nhận được sản phẩm và thanh toán cùng một thời điểm.</div><div><strong>7. Tôi muốn biết cách liên hệ tới Dịch vụ khách hàng và thời gian có thể tư vấn khách hàng?</strong></div><div><em>Quý khách có thể liên hệ Dịch vụ khách hàng theo thông tin sau:&nbsp;</em></div><div>459 Tôn Đức Thắng, Hoà Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam.<br>Điện thoại: 0528152815<br>Mail: ShoesShop@gmail.com</div></div>
                                </div>
                            </div>
                        </div>
                        <!-- noi dung-->
                    </section>
                </div>
            </div>
        </div>
    </div>
@stop

@extends('layouts.master')
@section('content')
<!-- booker -->
<div class="booker playing-bet placing-bet-page" id="booker">
    <div class="global-shape style-3">
        <img src="assets/img/shapes/shape-1.png" alt="" data-aos="fade-left" data-aos-duration="700"
            data-aos-delay="200">
    </div>
    <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
            data-aos-easing="ease-in">
            <h3 class="sub-title">Bookmaker</h3>
            <h2 class="title">Best Bookmakers Recommended</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach($booker_hot as $booker)
                <div class="col-md-4">
                    <div class="items-booker">
                        <a href="#">
                            <img src="{{$booker->image}}" alt="">
                        </a>
                        <h3 class="name">{{$booker->name}}</h3>
                        <ul class="feature-list">
                            @foreach (explode(',', $booker->sale_text) as $sale_text)
                            <li>{{$sale_text}} </li>
                            @endforeach
                        </ul>
                        <div class="d-flex gap-2 justify-content-center align-items-center mt-3">
                            <a href="{{$booker->url}}" class="prd-btn-1 d-flex">
                                Chi tiết <i class="fa-duotone fa-arrow-right"></i>
                            </a>
                            <a href="{{$booker->url}}" class="prd-btn-2 d-flex">
                                Bet <i class="fa-duotone fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end booker -->

    <!-- playing bet begin -->
    <div class="playing-bet">
        <div class="global-shape style-2">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="700"
                data-aos-delay="200" class="aos-init">
        </div>
        <div class="global-shape style-3">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="700"
                data-aos-delay="200" class="aos-init">
        </div>
        <div class="container">
            <div class="section-title aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                data-aos-easing="ease-in">
                <h3 class="sub-title">News</h3>
                <h2 class="title">Sports betting News</h2>
            </div>
            <div class="blog-posts">
                <div class="global-shape style-3">
                    <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="500"
                        data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="400">
                </div>
                <div class="container">
                    <div class="row g-4">
                        <div class="col-xl-8 col-lg-12">
                            <div class="row g-4">
                                @foreach ($posts as $post)
                                @if ($loop->index < 4)
                                <div class="col-xl-12 col-lg-12 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index*100 }}"
                                    data-aos-duration="500" data-aos-easing="ease-in">
                                    <div class="single-blog">
                                        <div class="part-img">
                                            <img src="{{$post->images->first()->url}}" alt="">
                                        </div>
                                        <div class="part-text">
                                            <span class="post-category">{{$post->categories->first()->name}}</span>
                                            <h3 class="blog-post-title">
                                                <a href="{{route('post.detail', ['alias' => $post->slug])}}"> {{$post->title}}</a>
                                            </h3>
                                            <p>{{$post->description}}</p>
                                            <div class="post-info-stats">
                                                <a href="#" class="post-creator">
                                                    <div class="creator-pic">
                                                        <img src="{{asset('bet/logo.png')}}" alt="">
                                                    </div>
                                                    <span class="creator-name">Bettest</span>
                                                </a>
                                                <span class="posting-time">{{$post->created_at}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               @endif
                               @endforeach
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div class="row g-4">
                                @foreach ($posts as $post)
                                @if ($loop->index >= 4)
                                <div class="col-xl-12 col-lg-12 col-md-6" data-aos="fade-up" data-aos-delay="{{$loop->index*100}}"
                                    data-aos-duration="500" data-aos-easing="ease-in">
                                    <div class="single-blog vertical-style">
                                        <div class="part-img">
                                            <img src="{{$post->images->first()->url}}" alt="">
                                        </div>
                                        <div class="part-text">
                                            <span class="post-category">{{$post->categories->first()->name}}</span>
                                            <h3 class="blog-post-title">
                                                <a href="{{route('post.detail', ['alias' => $post->slug])}}">{{$post->title}}</a>
                                            </h3>
                                            <p>{{$post->description}}</p>
                                            <div class="post-info-stats">
                                                <a href="#0" class="post-creator">
                                                    <div class="creator-pic">
                                                        <img src="{{asset('bet/logo.png')}}" alt="">
                                                    </div>
                                                    <span class="creator-name">Bettest</span>
                                                </a>
                                                <span class="posting-time">{{$post->created_at}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- blog posts end -->

        </div>
    </div>
    <!-- playing bet end -->
<!-- call to action begin -->
    <div class="call-to-action">
        <div class="container">
            <div class="row justify-content-center aos-init" data-aos="fade-up" data-aos-delay="50"
                data-aos-duration="500" data-aos-easing="ease-in">
                <div class="col-xl-9 col-lg-9 col-md-7 col-sm-10 d-xl-flex d-lg-flex d-block align-items-center">
                    <div class="part-text">
                        <h4 class="title">Promo Code</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 d-xl-flex d-lg-flex d-md-flex d-block align-items-center">
                    <div class="part-btn">
                        <a class="prd-btn-1" href="#/faq">Get Help <i class="fa-regular fa-circle-info"></i></a>
                    </div>
                </div>
            </div>
            <div class="row aos-init" data-aos="fade-up" data-aos-delay="50">
                <div class="col-md-3">
                    <div class="item-promo text-center">
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMQDxUQEhESFRUWFRcVGBYVFxUVFhoXGBgYFhYVGBcYKCggGBolHRYYITEiJSkrLy4uFx8zODMtNygtLisBCgoKDg0OGxAQGjAlICYuLSstLS8wKy0rLS0tLS0tLS0tLS0rLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAHABwAMBEQACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABgcEBQgBAwL/xABJEAABAwICBAsECAQDBwUAAAABAAIDBBEFEgYhUdEHExYXMUFUcZGSkyJhgaEUMlJTgrHB0kJyorIjY4MVM0NiZMLiNHOjs+H/xAAbAQEAAwEBAQEAAAAAAAAAAAAAAQMEBQIGB//EACwRAQACAQMDAgYCAgMAAAAAAAABAgMEEVESExQFIRUiMUFSYQYWQpEygaH/2gAMAwEAAhEDEQA/ALxQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQeXQaWr0uoYnFj6yAOHSM4JHuNuhHiclI+74cucO7bB5kR3acnLnDu2weZDu05OXOHdtg8yHdpycucO7bB5kO7Tk5c4d22DzId2nJy5w7tsHmQ7tOTlzh3bYPMh3acnLnDu2weZDu05OXOHdtg8yHdpycucO7bB5kO7Tk5c4d22DzId2nJy5w7tsHmQ7tOTlzh3bYPMh3acnLnDu2weZDu05OXOHdtg8yHdpycucO7bB5kO7Tk5c4d22DzId2nJy5w7tsHmQ7tOTlzh3bYPMh3acnLnDu2weZDu05OXOHdtg8yHdpycucO7bB5kO7Tk5c4d22DzId2nJy5w7tsHmQ7tOTlzh3bYPMh3acnLnDu2weZDu05OXOHdtg8yHdpycucO7bB5kO7Tk5c4d22DzId2nJy5w7tsHmQ7tOTlzh3bYPMh3acnLnDu2weZDu05OXOHdtg8yHdpycucO7bB5kO7Tk5c4d22DzId2nJy5w7tsHmQ7tOTlzh3bYPMh3acnLnDu2weZDu05OXOHdtg8yHdpycucO7bB5kO7Tk5c4d22DzId2nJy5w7tsHmQ7tOTlzh3bYPMh3acnLnDu2weZDu05OXOHdtg8yHdpycucO7bB5kO7Tk5c4d22DzId2nJy5w7tsHmQ7tOTlzh3bYPMh3acvW6cYcTb6bB8XW+ZQ7tOW8p6hkjQ9j2vaehzSHNPcRqKPcTEvqiRAQVDwu6WycccPheWtaAZi02LnOAcI7j+ENIJ25rdWsx6jLO/TCrgFDI9QEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEG/0M0pkw2cPa4mFxHGx/wlvW4DqeBrB67WUrMWSaS6MjeHAOBuCAQfcdYKOk/aJeIOZdKKvjq+pl+1PJbuDi1vyAUOVkne0y1iPIgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIPHHUg6fwCEx0kDHdLYY2nvDACpdWv0hsEemLilSIYJZT0Mje/wArSf0RFp2hy1cnWek6z39ahyXqAg+1FTGWVkTfrPc1g2XcbXPuVebLGKk3n7PeOk3tFYSzm6n+/g8H7lwf7Hh/GXT+EZOTm6n+/g8H7k/seH8ZPhGT8njuDuo6poD5x+iR/I8H3rJPpOTlpsX0ZqaVueSMFg6XsOZo7+sfELo6X1TT6idqz78Sx5tFlxe8w066LKldBoHPNEyUSxND2h4Bz3AcLi9h0rhZvXsOLJNJrPs6eP0vJesW3+r783U/38Hg/cqv7Hh/GXv4Rk5Obqf7+DwfuT+x4fxk+EZPyObqf7+DwfuUx/IsMzt0yifSckRvu1uBaJS1kZlZJG1oeWDNm12ANxYdGtatX6xj01oraJ3mN1ODQXzRvEtlzdT/AH8Hg/csn9jw/jK/4Rk/I5up/v4PB+5R/Y8P4yfCMnJzdT/fweD9yn+x4fxk+EZPyYeL6Fy0sD53zRFrLagH3NyGgC42laNL63j1GWMdazvKrP6dbDSb2l8tENEZMTMoiljYYshIfm1h+a1sv8pXaYseKb/dJOZ+q7TT+Em5St8W3Kv6ynMUr4ndMb3xm3Rdji0291woZ5jadmw0ZwCXEKgU8RaDlLi518rWjrNveQPij1Sk3naEw5n6rtNP4SblK7xbcodpLgb6CpdTSOa5zWtdmbfKQ4XFr6/d8FCnJTonaWHh1E+omjgjF3yODGj3nrPuAuT7gUeaxNp2hPeZ+q7TT+Em5S0eLblG9KtE5MOkjifNFJJJrDYw64Fw0E32m4HcVCu+KaTtMpJzP1faafwk3KVni25aLS7QiXDY2SSzRPzvyBrA6/1S4nX1arfEIryYZp7zL6aKaBT4jAZ45YmNDyz281yQASRl6vat8CiceGbxvEs/FeCyrggfMJYZMjS4sYH5iB05bjWbXNuuyPVtNaI33QMFQzpHohofNifG8U+Ngiy3L82suzahl2ZfmFK3Him/0SPmfq+00/hJuRZ4tuUIocLdNVtpGOaXOl4oO15dRIL9uWwJ7lCiKb26U35n6vtNN4SblK/xbcohpPo/Lh9RxE1icoc17b5XNPWL7DcEb0U3pNJ2lqo2FxDR0kgDvJsFDxHvKxOZ+r7TT+Em5S0+LblH9L9DJcMbG6WaJ/GOcAGB1/ZFyTfq1jxRXkxTT6srRfg+qMQpxUxyxMaXOaA/Pc5TYnUOi9x8ETjwTeN225n6vtNN4Sbke/Ftycz9X2mm8JNyHi25OZ+r7TTeEm5DxbcobW4I+OuNDna94lbDmbfLmcWjr12Bdr7ioUzSYt0plzP1faabwk3KV3i25OZ+r7TTeEm5DxbcvhU8Elc0XZJTP92Z7T822+aInTWQ7F8InpJOLqInxuOsZrWI2tcLhw7ioU2pNfqwkeRAQZWFUvHVEMX3ksbPM8A/miaxvLqMDqUus9QRjhLq+KwmpPW5gjH+o4M/JxRVnnakueFDmiAgkGgVNxmIRnqYHyH4DKPm4Lk+tZe3pLftu9Op1Z4W2vgH1LR4jpZS08roZHvD22uAxzgLgEax7iF1MHpGpz44yUj2liy+oYsdumzNwjGIathfC/MAbG4LSD1XBWbVaLLprRGSF2DUUzRvSWc5oIIIBBFiD0EHpB9yzUvNJ6o+y60RMbSpLEqINq5KdnQJnRt8+Vo/IL9Hw5pnTRknjd8hkxxGaaRyuyKMMaGjoaA0dwFl+c5bdV5t+312OvTWIYmJYtBTZeOlbHmvlzX12tfo7wrtPo82fft132V5dRjxf852YXKyi7VH/VuWn4Rq/wAFPn6f8mLiultL9Hl4uoY5/FuygZrlxBAtq2rRpfSdT3q9dPbdVn1+Htz0292Jofi9JT0MUb6mFrrFzgXawXOJsfeAQPgrvVNFqc+ptatJ2+yrRanDjxRE290joMVgqCRDMyTLYnKb2v0X8CuPn0mbBETkrtu6GLPjy/8ACd2Ys69rJtIaRjix9TC1zSQQXC4I6Qfet1PTdTasWik7Sy21mGs7TZF9PsegmpWxQzMkLpGlwYb2a0E3P4sq7fomgzYs83yV29nN9S1WO+PppO768CFRatnj+3AHeR4/eV9a5mmn5phdCNzm7TqDi8Uq2/5znecCT/uUOZlja8rZ4JtHfotFx722lqLPN+lsf/Db7tRLj/N7lLZp6dNd5TlF6juGmHLibXfap2eIfID+ihg1MfNu2/Ato9cvxB46LxQ3/wDkeP7R+JS96an+S1KupZFG6WRwaxjS5zj0BrRcnwCNcztG8qEwysdimOxSvB9udrg0/wAMcV3tb4M1+8lQ59Z7mTd0CpdFTnDjW5qmngv9SN0hHvkcGj/6z4oxaqfeITvgyouJwmnFtb2mU/6ji8fIhGjDG1ISdFqguE3Rj6DV5422gnJcy3Q1/S+P3dNx7jb+FQ5+fH0zun3AtRZMOdL1yzPd8GARj5td4qWjTR8m6Y49W/R6Saf7uJ7/AItaSEXXnasypLghouMxRjjr4qN8h77CMf3/ACRh08b3X4joIpwjaMf7QoyGAcfFd8R2/aj7nAeIaepFObH11/amNB6LjsTpoiD/AL4OIItbi7yEEdX1LKGLFXe8Q6RUumpThtrc1dFD1RQ5j3yON/lG3xRh1U/NELM0BouIwulYRYmJrz/NJ/iH5uRqxRtSGzxXFYaSPjZ5GxsuG5nXtc9A1I9zaI95afl/hvbYv6tyPHepy85f4b22L+rch3qcqn0EaazHWSnrllqD/U5v9Tmox4vmy7r+R0GmxHSmip5DFNVQxvFiWudYi4uPkjxN6x9ZbGirY52CSKRkjD0OYQ5p+IR6iYn6MHSfAo6+lfTyAaxdjutjx9V47j4i460eb0i1dpc0OaQS0ixBII2EaiPFQ5cxtLxAQSbg0pONxanHU1zpD+BjiPnZStwRveHRCOkIK64bavLQxRfeTi/cxrnfnlRm1M/LspZQwiAgnXBbTe3PLsayMfElzv7Wr5f+SZflpT/t2fSKbzaywV8k7yKYloNFPM+Z00wc9xcQMlhfqFx0Bd7B69kw44pWsbQ5mX0ymS82mfq2+AYFFRMLI8xzG7nOILjbUOgAAD9Vz9br8mrtvf7NWn0tMEbVY+k2ksdEy31pXC7Ga+7M49TR4q70302+qtv/AIx9Ves1dcFdvurrROEz4jCXazxhlcdpbeQnzW8V9d6laMGjtEcbODpKzk1Eb87rhX56+safHdHIaxzXSmT2AQMrgBrNz1HXqHgujovUsulrNce3ux6nR0zzE2+zWc39Jtn843Lb/YdV+mb4Th/aF6Y4XFSVAhhzkcWHOzG5uSbDoHUB4r6P0rVZdTh68jka3DTDk6atGuoxrH4L6a1PLL9uQNHcxo/VxXxv8jy75a04h9B6RTak2TNzwASegAk9w1lfP469Voh1bztWZURUTmR7pD0vc55/ESf1X6bhp0Y614iHxuS3VaZfhWvCYcEtRkxaIfbZIz+nP+bEXaefnX6pdFUmN6LfTNJXRub/AIWSKeXYWhuTL+JzLd2bYjJbH1ZVtgWRqeRyBwDmkEEXBGsEHoIKJVbwuYO+qr6GKP60okjvsyuY4uPuDS4/BGTPXqtELJwugZTQRwRizI2hje4dZ956T3o01jaNld8NGkOSJlBGfaktJLbqjB9lv4nC/cz3oz6m+0dKPcC9FnxF8vVFC7zPcGj5B6KtNHzbrvRvc+cJVQanF5mN1kOZA3vDQP73ORzs09WRftFTiKJkY6GNawdzQAPyR0IjaNn2RLUaV4CyvpH079RIux32ZB9V3jqO0EjrR4vSLRs80Pwx1JQU9O8APZGM4BuM59p9j1+0ShSvTWIaThcreKwmRvXK+OIdxcHO/pa5FeedqSjfAXR/+qqP/biHwu939zEV6WPrK10a3qCH0uh4hxo17ABG+F5c3ZO4tBIGxzcx777UUxj2v1Jei5zxpq81mMzMBvnnbA34ZYfzBKhzsk9WR0LFGGtDR0AADuGoKXQ29mp0n0cixGJsMxkDWvD/AGHBpJALRfUdXtFHm9IvG0o1zS0H2qn1B+1FXjUQrhL0TpcNZCIDKXyOffO4OGVgF9QA13c35ooz460j2Z/AdRZqmonI+pG2MH3vdmPyjHij1pY95lcaNrnbTOKeoxKpkEE5BlLW2ikNwy0bbatYIb81DnZYtN5nZaHBHgs1LRP49jmGWXO1jtTg3K1tyP4SbdHcpatPSa1902qJmxsc9xs1oLiT0AAXJRdPs5Ynlzvc+1s7nPtszEut81DlWneX4RAgsTgRpM1dLL93Db4yOFvkwqWnSx80yupG4QU7w5Vd6imhv9WN7z+NwaP7D4oxaqfeIVmoZRAQWlwcU2Shz/eSPd8BZg/tK+G9fy9Wp6eIfS+l02w78pBidYIIJJiL8Wxz7bbC4HxOpcrTYZzZa4+Zbs2Tt0m/CC847+ys9R25fT/1un5/+OL8Yt+KX6OYwKynE2Qs9pzS29xduw9YXz/qGj8XL2993V0uo79OrbY0lw1lTSyMeBcNc5p62uAJBH5HaCp9N1N8Oes1n6o1eGuTHO6E8F9PmqZJfsRADveR+jT4r6T+RZenDWnMuR6TTfJNuFlL4x9Dug9fwgiOaSMU4cGPczNxlr5SRe2U26F9Lh/j3cxxeb7buPk9V6bTWKvhzkf9KPV/8Vb/AFuPzV/F5/FEccxI1VQ+cty5rWbe9gGhoF9V+j5r6HRaaNNijHH2crUZpzXm8sFalK4NC6bi8PhH2m5z+Ml35EL889Xydeqt+vZ9XoKdOCr6aWVPFUM776+LLR3vswf3Lz6Xi7mqpH7etbfow2lTS/RXyT1Bu9B6ji8UpH/5zW+e7P8AuRZina8OklLpvkylYJHShozvDWud1kMzZR3DM7xKI2RXhP0i+hUJax1pp7xst0gW9t/wB8XNRVmv01bHQKbPhVI7/p42+Vob+iPeOd6Q3ElIx0jZS0F7Gua07A/Lmt35G+CPWz8YlXMp4XzyGzI2l7j7gL+KEztG7mjG8UfV1MlTJ9aRxdb7I6GtHuDQB8FDl3t1TutTgOostPUTkfXlawdzG3/OQ+Clr0se0ysuR4aC49ABJ7gjS540Qb9NxqF518ZUOnPcC6b9AEc7H82R0QjpILjWmf0XG46V7rQOhY15PQ2R7nFj/cLAA/zX6kUWy9N+mU6Re9QVTw6Vmqlp9pklPwAY3+93gjJqp+kJDwQ0XFYUx1tcr5JPhmyN/pYEWaeNqN5phiBpsPqJ2mzmxOynrDyMrCPxEIsyW6azLF0E0kGI0bZTYSt9iVo6njrA+y4e0O+3UiMeTrrukaLHxqpxHG6R3Qxpce5oufyRE+ygODqA1WMQvdr9t9Q7vAc+/nLVDn4fmyOhFLooBpfwlCgrHUophLlawl3G5Nbhmy2ynqI6+tGfJn6LbNLzynsI9f8A8EV+V+kN030rOJzRyGLihGwsDc2fWXXLr2HuHR1KFOXJ1yszgWosmHOl65ZnH4MAjHza7xUtWmjam6fo0CD51NQyNhkke1jWi7nOIa0DaSdQCImdvdUPCRwhMqY3UdISY3apZegOH2Gf8p63dY1DUbox5s28dNVaKGUQEFw8BtJanqJrfWlawdzG5vzkPgpbdLHtMrNRqEFAcLFVxmLSj7tscfg3Ofm8o52one6IKFIg8JtrSRduj9LxNJDH1tibfvIu75kr811+Xuai9v2+w0tOjFWP0yqumZKwxyNDmOFi03sR09XcqMWW2K0XpO0rb0revTb6NXyUouyx/wBW9bvi+r/Nl8DT/i2tPA2NoYxrWtGoNaAAO4BYMmS2S3Ved5aqUikbVhH9NceZTwPiDgZpGloaOlodqL3bNV7bT8V1/SPT75ssXtHywwa/V1x0msT7ywuDGmy0skn25LDuYAPzLlo/kWXfNWnEKvSabY5tymK+ddZguwamJuaaAk6z/hs6dvQtUa3UR7dcqJ02Kf8AGHn+xabs0Hps3J52o/Of9ni4vxhXHCAyNlYI4o2MDI23DGtbdziXa7dOrKvsvQ7ZLafrvO+8/d8/6lFYy9NY22RtrC4ho6XENHeTYfMrrZLdNZlgrG8xC94IgxjWDoa0NHcBYfkvzLNfryWtzL7PHXprEInwm1OWkZH9uUeDAXfnlXc/juLfPNuIc31a+2OK8qzX2j50Qfahn4uaOT7EjH+Vwd+iJrO07upwVLrQEoOdNPtIfp9c+RpvEz/Di2ZAdb/xG57suxHNy367Lb4JZ8+EQj7LpWeEjiPkQjZgn5ITBFyqeGnSHUzD2HptLNbZ/wANh+IzfBu1GTU5P8YVQoY3QnBhR8ThNOOt7TKf9RxcP6SFLo4Y2pDM07reIwyqkBseKc0fzP8AYb83BHrJbasyq/gTos9fJLbVFCQO+RwA+THeKMumj5t12o3Ob9Pazj8Tqn9I40xjujAj8PZPioczLbe8ytjgq0o+mUvESOvPAA0k9L4+hj/edWU+8X61LZgydUbSnCL1DcMNdxmKOaNYiiYy3vIMh/vHgjn6id77Lp0dofo9HBB93Exp7w0X+d0bqRtWIRLhnrcmGiK+uWZjfg28h/sHiinUTtRWWgWkpw6sEjieJfZkw/5b6n97Sb9xcOtQy4cnRZ0Sx4IBBBBFwRrBB6CFLpI3wk1vE4TUuvYuZxQ75HCP8nFFWadqSgHAfRZqqee31ImsB98jrn5R/NGfSx7zK5EbWuqcApZXmSSlge93S50bHONgALki51AD4I8zSJ+z5cmKLsVN6Ue5EduvCteGalp6dlPFDBDG5xe9xYxrTlaA0AkDou+/4UZdTFYiIiFiaEUXEYbTRkWIha538zxnd83FGnHG1Ihh8JWJupsLmkY9zHuyRtc0lrgXuAJBGsEC5+CIzW6aTMI9wRaWPqA+jqJHPlbeSN7yXOcwn2mknWS0nwd7kV6fJ1e0rDrKVk0bopGhzHtLXNPQQRYhGiY3c26UYI6gq5KZ1zlN2OP8UZ+o79D7wVDmZKdM7NUjwICC/uCel4vCYT1yF8ni8gf0gKXQ08bUhMEXvEHMmk1Xx1dUy/ankI7g4hvyAUOVkne0y1qPIgKJjeNkxO07pPy9rNsPpneuPPoWlmd5iW+PU88RscvazbD6Z3qPgGk4lPxTP+jl7WbYfT//AFPgOk4k+KZ/0xKvS+skFjOWj/LDWfMa/mr8XpGlxzvFVV9fnvG0y0bjckkkk6yTrJO0nrXSrWKxtEMczM/VvcL0tqaaJsMfFZG3tdlzrJcbm+0rm6j0nT6jJOS/1bMWuy4q9NfoyuXtZth9M71R8A0nE/7W/FM5y9rNsPpnenwDScSfFM5y9rNsPpnenwHScSfFM7QYjXPqJXTSWzOsTYWGoACw6tQC6mDBTBSKU+kMWXJbJbqt9XzppzHI2RtrscHC4uLtNxcdYuF7yUjJWaz93mlprO8JHy9rNsPpneuR8B0nE/7b/imf9NXjePTVmTjiz2L2ytyj2rXvrN+gLbpNBi0u/bj6s2fVZM+3X9msW1nEHjhcWQTaPhSxBoABp9QA/wB0er8SL41F3xxDhJr54XwudEGvaWEsYWusRY2NzY260ROovMbIeEUpJo9pvV0EPEQGLJmL/bYXG7rX13GrUpW0zWpG0Npzq4jtp/SP7kevJuiGI1z6iZ88rsz5HFzj0a9gHUALADYAoU2mZneWMUQmVJwmV8UbImfRw1jWsaOKPQ0WH8WwIvjUXiNmJj2ndZWwGnmMWQlpORhafZOYa7nVcDwR5vmtaNpYujWldRhwk+j8V/iZcxewuPs3sBrFh7R8URTJNPo3XOriO2n9I/uR78m6FyyFzi4m5cS4n3k3J8SiiZ3ZmCYvLRztqIHAPaCNYu0gixa4dY6PiBsR6paazvCUc6mI7af0j+5St8m6KV+JST1DqmTKZHvDzq9m4tYW+zqAtsUKptMzulfOpiO2n9I/uUrfJu0ukullTiIYKgx2jLi0Mbl1usCTrN+j5lQ8Xy2v9WjRWleEcIddSwMp43RFkYytzsLnBvU29xqHQPcAi6ue1Y2Y+kOm9XXw8ROYsmYP9hhabtva5udWv8kRfNa0bS+WjWl9Th7Hsp+KAe4OcXsLjcCw13GreURTLakbQ3POriO2n9I/uRZ5NznVxHbT+kf3IeTc51cR20/pH9yHk3R3STSGfEJGyVBYS1mQBjcotck6rnXr+QRVfJN53lIG8KeIAAA09hq/3R/cpWRqLtZpFprV18QhnMWQPD/YYWm4BAubnV7RUPN81rxtLTYXiElNMyeJ2V8bszT0jYQR1ggkEe9FdbTWd4S3nVxHbT+kf3KV3k3aPSTSefECw1AizMuGuYwtNja7Sbm41XUK75Jv9WlR4EHjjYXQdO6N0nEUVPD9iGNp7w0X+al1aRtWIbJHpjYlPxcEkn2I3u8rSf0RE/RyyCTrPT196hyXqAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIMvCKXjqmGH7csbPg5wB+RR6rG9odRBS6r1B+JYw5paRcEEEe4ixCIc06T4DJQVLqeQGwJMbup8d/ZcDttqOwqHMvSaW2apHgQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEE74JdHX1FY2rc0iGAk5j0OktZrRttfMdlhtUtGnxzNt15o3iAgwMXweCrj4uoiZI3pAcNYO1pGtp94KPNqxaNphFXcFWHk6mzD3CV363KKvGo85qMP2T+odyI8bGc1GH7J/UO5DxsZzUYfsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNRh+yf1DuQ8bGc1GH7J/UO5DxsZzUYfsn9Q7kPGxnNRh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNTh+yf1DuQ8bGc1GH7J/UO5DxsZzUYfsn9Q7kPGxnNRh+yf1DuQ8bGc1GH7J/UO5DxsZzU4fsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzUYfsn9Q7kT42M5qMP2T+odyI8bGc1GH7J/UO5DxsZzUYfsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNTh+yf1DuQ8bGc1OH7J/UO5DxsZzU4fsn9Q7kPGxnNRh+yf1DuQ8bGc1GH7J/UO5DxsZzUYfsn9Q7kT42M5qMP2T+odyHjY32puC7DmODjHI+3U+R5b8QLX+KEaenCX0tMyJjY42NYxos1rQGtA2ADoRdEbfR9USICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg/9k=" alt="">
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Exercitation commodo nisi do</span>
                        <div class="code mt-4 justify-content-center">
                            BET365
                        </div>
                        <a href="" class="prd-btn-1 d-flex">
                                Claim <i class="fa-duotone fa-arrow-right"></i>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- call to action end -->
    <!-- sports schedule begin -->
    <div class="sports-schedule">
        <div class="global-shape style-4">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="1500"
                data-aos-delay="500" class="aos-init">
        </div>
        <div class="container">
            <div class="section-title aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                data-aos-easing="ease-in">
                <h3 class="sub-title">next schedule</h3>
                <h2 class="title">Fixtures of all Upcoming Matches</h2>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-8 order-md-1 order-2 aos-init" data-aos="fade-up"
                    data-aos-delay="150" data-aos-duration="500" data-aos-easing="ease-in">
                    <div class="single-view-schedule-content">
                        <div class="tab-content" id="schedule-tab-content">
                            <div class="tab-pane fade show active" id="v-schedule-one" role="tabpanel"
                                aria-labelledby="schedule-one-tab">
                                <div class="single-view-schedule">
                                    <div class="schedue-header">
                                        <span class="tournament-name">UEFA Champions League - 2022</span>
                                        <span class="stadium-name">Tottenham Hotspur Stadium, london</span>
                                    </div>
                                    <div class="schedule-body">
                                        <div class="schedule-stats">
                                            <div class="single-team">
                                                <div class="team-icon">
                                                    <img src="{{asset('bet/icon-1(2).png')}}" alt="">
                                                </div>
                                                <span class="team-name">Dinamo Zagreb</span>
                                            </div>
                                            <div class="date-times-vs">
                                                <span class="time"><i class="fa-regular fa-clock"></i> 09:00 AM</span>
                                                <span class="date">24 Nov SAT, 2022</span>
                                                <img src="{{asset('bet/vs.png')}}" alt="" class="versace-icon">
                                            </div>
                                            <div class="single-team">
                                                <div class="team-icon">
                                                    <img src="{{asset('bet/icon-5.png')}}" alt="">
                                                </div>
                                                <span class="team-name">Bodo Glimt FC</span>
                                            </div>
                                        </div>
                                        <div class="placing-bet">
                                            <a href="#0" class="place-a-bet placed">0.25</a>
                                            <a href="#0" class="place-a-bet">1.42</a>
                                            <a href="#0" class="place-a-bet">4.32</a>
                                        </div>
                                    </div>
                                    <div class="schedue-timer timer" data-date="30 Feb 2023 9:56:00 GMT+01:00">
                                        <div class="time-starting-text">
                                            <span class="txt">starting on</span>
                                            <img class="icon" src="{{asset('bet/vector-line.png')}}" alt="">
                                        </div>
                                        <div class="all-timer-task">
                                            <div class="single-time">
                                                <span class="number day">-464</span>
                                                <span class="title">Days</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number hour">12</span>
                                                <span class="title">Hours</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number minute">53</span>
                                                <span class="title">Minutes</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number second">11</span>
                                                <span class="title">Seconds</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-schedule-two" role="tabpanel"
                                aria-labelledby="schedule-two-tab">
                                <div class="single-view-schedule">
                                    <div class="schedue-header">
                                        <span class="tournament-name">EURO Cup Champions - 2022</span>
                                        <span class="stadium-name">Stadium 974. Doha, Qatar.</span>
                                    </div>
                                    <div class="schedule-body">
                                        <div class="schedule-stats">
                                            <div class="single-team">
                                                <div class="team-icon">
                                                    <img src="{{asset('bet/icon-6.png')}}" alt="">
                                                </div>
                                                <span class="team-name">Bayern Munich</span>
                                            </div>
                                            <div class="date-times-vs">
                                                <span class="time"><i class="fa-regular fa-clock"></i> 09:00 AM</span>
                                                <span class="date">24 Nov SAT, 2022</span>
                                                <img src="{{asset('bet/vs.png')}}" alt="" class="versace-icon">
                                            </div>
                                            <div class="single-team">
                                                <div class="team-icon">
                                                    <img src="{{asset('bet/icon-2(2).png')}}" alt="">
                                                </div>
                                                <span class="team-name">Manch. United</span>
                                            </div>
                                        </div>
                                        <div class="placing-bet">
                                            <a href="#0" class="place-a-bet placed">0.25</a>
                                            <a href="#0" class="place-a-bet">1.42</a>
                                            <a href="#0" class="place-a-bet">4.32</a>
                                        </div>
                                    </div>
                                    <div class="schedue-timer timer" data-date="02 Feb 2023 9:56:00 GMT+01:00">
                                        <div class="time-starting-text">
                                            <span class="txt">starting on</span>
                                            <img class="icon" src="{{asset('bet/vector-line.png')}}" alt="">
                                        </div>
                                        <div class="all-timer-task">
                                            <div class="single-time">
                                                <span class="number day">-492</span>
                                                <span class="title">Days</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number hour">12</span>
                                                <span class="title">Hours</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number minute">53</span>
                                                <span class="title">Minutes</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number second">11</span>
                                                <span class="title">Seconds</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-schedule-three" role="tabpanel"
                                aria-labelledby="schedule-three-tab">
                                <div class="single-view-schedule">
                                    <div class="schedue-header">
                                        <span class="tournament-name">Champions Trophy Cup - 2023</span>
                                        <span class="stadium-name">Khalifa International Stadium, Qatar</span>
                                    </div>
                                    <div class="schedule-body">
                                        <div class="schedule-stats">
                                            <div class="single-team">
                                                <div class="team-icon">
                                                    <img src="{{asset('bet/icon-3(2).png')}}" alt="">
                                                </div>
                                                <span class="team-name">PSV Eindhoven</span>
                                            </div>
                                            <div class="date-times-vs">
                                                <span class="time"><i class="fa-regular fa-clock"></i> 09:00 AM</span>
                                                <span class="date">30 Jan SAT, 2023</span>
                                                <img src="{{asset('bet/vs.png')}}" alt="" class="versace-icon">
                                            </div>
                                            <div class="single-team">
                                                <div class="team-icon">
                                                    <img src="{{asset('bet/icon-7.png')}}" alt="">
                                                </div>
                                                <span class="team-name">Atlético Madrid</span>
                                            </div>
                                        </div>
                                        <div class="placing-bet">
                                            <a href="#0" class="place-a-bet placed">0.25</a>
                                            <a href="#0" class="place-a-bet">1.42</a>
                                            <a href="#0" class="place-a-bet">4.32</a>
                                        </div>
                                    </div>
                                    <div class="schedue-timer timer" data-date="30 Jan 2023 9:56:00 GMT+01:00">
                                        <div class="time-starting-text">
                                            <span class="txt">starting on</span>
                                            <img class="icon" src="{{asset('bet/vector-line.png')}}" alt="">
                                        </div>
                                        <div class="all-timer-task">
                                            <div class="single-time">
                                                <span class="number day">-495</span>
                                                <span class="title">Days</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number hour">12</span>
                                                <span class="title">Hours</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number minute">53</span>
                                                <span class="title">Minutes</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number second">11</span>
                                                <span class="title">Seconds</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-schedule-four" role="tabpanel"
                                aria-labelledby="schedule-four-tab">
                                <div class="single-view-schedule">
                                    <div class="schedue-header">
                                        <span class="tournament-name">Mahtma Gandhi League - 2022</span>
                                        <span class="stadium-name">Chandrasekharan Nair Stadium, India</span>
                                    </div>
                                    <div class="schedule-body">
                                        <div class="schedule-stats">
                                            <div class="single-team">
                                                <div class="team-icon">
                                                    <img src="{{asset('bet/icon-5.png')}}" alt="">
                                                </div>
                                                <span class="team-name">Leeds United</span>
                                            </div>
                                            <div class="date-times-vs">
                                                <span class="time"><i class="fa-regular fa-clock"></i> 09:00 AM</span>
                                                <span class="date">03 Apr SAT, 2023</span>
                                                <img src="{{asset('bet/vs.png')}}" alt="" class="versace-icon">
                                            </div>
                                            <div class="single-team">
                                                <div class="team-icon">
                                                    <img src="{{asset('bet/icon-1(2).png')}}" alt="">
                                                </div>
                                                <span class="team-name">Bayer Leverk.</span>
                                            </div>
                                        </div>
                                        <div class="placing-bet">
                                            <a href="#0" class="place-a-bet placed">0.25</a>
                                            <a href="#0" class="place-a-bet">1.42</a>
                                            <a href="#0" class="place-a-bet">4.32</a>
                                        </div>
                                    </div>
                                    <div class="schedue-timer timer" data-date="03 Apr 2023 9:56:00 GMT+01:00">
                                        <div class="time-starting-text">
                                            <span class="txt">starting on</span>
                                            <img class="icon" src="{{asset('bet/vector-line.png')}}" alt="">
                                        </div>
                                        <div class="all-timer-task">
                                            <div class="single-time">
                                                <span class="number day">-432</span>
                                                <span class="title">Days</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number hour">12</span>
                                                <span class="title">Hours</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number minute">53</span>
                                                <span class="title">Minutes</span>
                                            </div>
                                            <div class="single-time">
                                                <span class="number second">11</span>
                                                <span class="title">Seconds</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-md-4 order-md-2 order-1">
                    <div class="all-schedule-list">
                        <div class="nav flex-column nav-pills" id="v-schedule-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active aos-init" id="schedule-one-tab" data-bs-toggle="pill"
                                data-bs-target="#v-schedule-one" type="button" role="tab" aria-controls="v-schedule-one"
                                aria-selected="true" data-aos="fade-left" data-aos-delay="150" data-aos-duration="500"
                                data-aos-easing="ease-in">
                                <div class="single-list-schedule">
                                    <div class="single-team">
                                        <div class="team-icon">
                                            <img src="{{asset('bet/icon-1(2).png')}}" alt="">
                                        </div>
                                        <span class="team-name">Dinamo Zagreb</span>
                                    </div>
                                    <img src="{{asset('bet/vs-sm.png')}}" alt="" class="versace-icon">
                                    <div class="single-team">
                                        <span class="team-name">Bodo Glimt FC</span>
                                        <div class="team-icon">
                                            <img src="{{asset('bet/icon-5.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link aos-init" id="schedule-two-tab" data-bs-toggle="pill"
                                data-bs-target="#v-schedule-two" type="button" role="tab" aria-controls="v-schedule-two"
                                aria-selected="false" data-aos="fade-left" data-aos-delay="200" data-aos-duration="500"
                                data-aos-easing="ease-in">
                                <div class="single-list-schedule">
                                    <div class="single-team">
                                        <div class="team-icon">
                                            <img src="{{asset('bet/icon-6.png')}}" alt="">
                                        </div>
                                        <span class="team-name">Bayern Munich</span>
                                    </div>
                                    <img src="{{asset('bet/vs-sm.png')}}" alt="" class="versace-icon">
                                    <div class="single-team">
                                        <span class="team-name">Manch. United</span>
                                        <div class="team-icon">
                                            <img src="{{asset('bet/icon-2(2).png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link aos-init" id="schedule-three-tab" data-bs-toggle="pill"
                                data-bs-target="#v-schedule-three" type="button" role="tab"
                                aria-controls="v-schedule-three" aria-selected="false" data-aos="fade-left"
                                data-aos-delay="250" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-list-schedule">
                                    <div class="single-team">
                                        <div class="team-icon">
                                            <img src="{{asset('bet/icon-3(2).png')}}" alt="">
                                        </div>
                                        <span class="team-name">PSV Eindhoven</span>
                                    </div>
                                    <img src="{{asset('bet/vs-sm.png')}}" alt="" class="versace-icon">
                                    <div class="single-team">
                                        <span class="team-name">Atlético Madrid</span>
                                        <div class="team-icon">
                                            <img src="{{asset('bet/icon-7.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link aos-init" id="schedule-four-tab" data-bs-toggle="pill"
                                data-bs-target="#v-schedule-four" type="button" role="tab"
                                aria-controls="v-schedule-four" aria-selected="false" data-aos="fade-left"
                                data-aos-delay="300" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-list-schedule">
                                    <div class="single-team">
                                        <div class="team-icon">
                                            <img src="{{asset('bet/icon-5.png')}}" alt="">
                                        </div>
                                        <span class="team-name">Leeds United</span>
                                    </div>
                                    <img src="{{asset('bet/vs-sm.png')}}" alt="" class="versace-icon">
                                    <div class="single-team">
                                        <span class="team-name">Bayer Leverk.</span>
                                        <div class="team-icon">
                                            <img src="{{asset('bet/icon-1(2).png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="see-all-schedule-btn-cover aos-init" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="500" data-aos-easing="ease-in">
                <a class="prd-btn-4" href="#/playing-bet-upcoming">see all sports <i
                        class="fa-duotone fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <!-- sports schedule end -->

    

    <!-- working process begin -->
    <div class="working-process">
        <div class="global-shape">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="500"
                data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="400" class="aos-init">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                    data-aos-easing="ease-in">
                    <div class="section-title">
                        <h3 class="sub-title">How it works</h3>
                        <h2 class="title">Easiest Step To Placing A Bet</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-process">
                        <div class="part-icon aos-init" data-aos="fade-up" data-aos-duration="500"
                            data-aos-easing="ease-in" data-aos-delay="100">
                            <img src="{{asset('bet/icon-1(3).png')}}" alt="">
                        </div>
                        <div class="part-text">
                            <span class="step-number aos-init" data-aos="fade" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="300"><span
                                    class="gradient-number">1.</span></span>
                            <span class="step-title aos-init" data-aos="fade-up" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="150">Open an account.</span>
                            <p data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in" data-aos-delay="200"
                                class="aos-init">Create an account. Enter your <br>personal details into the sign-up
                                form
                                &amp; click the 'Register' button.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-process pp-2">
                        <div class="part-text">
                            <span class="step-title aos-init" data-aos="fade-up" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="250">Make your deposit.</span>
                            <p data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in" data-aos-delay="300"
                                class="aos-init">Before you can make to placing bet, you’ll need to deposit some cash in
                                your account.</p>
                            <span class="step-number two aos-init" data-aos="fade" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="450"><span
                                    class="gradient-number">2.</span></span>
                        </div>
                        <div class="part-icon aos-init" data-aos="fade-up" data-aos-duration="500"
                            data-aos-easing="ease-in" data-aos-delay="350">
                            <img src="{{asset('bet/icon-2(3).png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-process">
                        <div class="part-icon aos-init" data-aos="fade-up" data-aos-duration="500"
                            data-aos-easing="ease-in" data-aos-delay="400">
                            <img src="{{asset('bet/icon-3(3).png')}}" alt="">
                        </div>
                        <div class="part-text">
                            <span class="step-number aos-init" data-aos="fade" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="600"><span
                                    class="gradient-number">3.</span></span>
                            <span class="step-title aos-init" data-aos="fade-up" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="450">Place your wagers.</span>
                            <p data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in" data-aos-delay="500"
                                class="aos-init">Now you’re ready to start placing<br> your bets online, so it’s time to
                                make your selections.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-process pp-2">
                        <div class="part-text">
                            <span class="step-title aos-init" data-aos="fade-up" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="550">Withdraw your winnings.</span>
                            <p data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in" data-aos-delay="600"
                                class="aos-init">If you are a winner, claim your prize:<br> Be sure to visit a retailer
                                before your prize expires in 12 months.</p>
                            <span class="step-number four aos-init" data-aos="fade" data-aos-duration="500"
                                data-aos-easing="ease-in" data-aos-delay="700"><span
                                    class="gradient-number">4.</span></span>
                        </div>
                        <div class="part-icon aos-init" data-aos="fade-up" data-aos-duration="500"
                            data-aos-easing="ease-in" data-aos-delay="600">
                            <img src="{{asset('bet/icon-4(1).png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- working process end -->

    <!-- feature begin -->
    <div class="feature">
        <div class="global-shape style-2">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="500"
                data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="500" class="aos-init">
        </div>
        <div class="container">
            <div class="row justify-content-xl-center justify-content-lg-start">
                <div class="col-xl-5 col-lg-8 col-md-8">
                    <div class="part-left aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                        data-aos-easing="ease-in">
                        <div class="section-title if-lines-break title-white">
                            <h3 class="sub-title">Why we are best</h3>
                            <h2 class="title">We're proud to provide best services to our clients</h2>
                        </div>
                        <div class="part-img">
                            <img class="img-shape aos-init" src="{{asset('bet/about-img-shape.png')}}" alt=""
                                data-aos="fade-up-right" data-aos-easing="ease-in" data-aos-duration="500"
                                data-aos-delay="200">
                            <img class="main-img aos-init" src="{{asset('bet/feature-img.png')}}" alt=""
                                data-aos="zoom-in-right" data-aos-easing="ease-in" data-aos-duration="500"
                                data-aos-delay="400">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12">
                    <div class="feature-list">
                        <div class="row">
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="100" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-1(4).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Reasonable odds</span>
                                        <p>The odds offered in a Betting
                                            Exchange are relatively better than odds given by bookmakers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="150" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-2(4).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Live Betting</span>
                                        <p>live streaming allows you to watch the games you’re betting on, bringing you
                                            closer to the action.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="200" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-3(4).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Plenty of Options</span>
                                        <p>we offer more than just betting options., Most of them allow you to stream
                                            games
                                            in real-time.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="250" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-4(2).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Easyest to Deposit</span>
                                        <p>When you are looking to bet online you need to fund your account before you
                                            can
                                            place your bets.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="300" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-5(1).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">Fastest Withdrawal</span>
                                        <p>It's easy to get retrieve your balance at a fast withdrawal, and you won't
                                            be left waiting.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 aos-init" data-aos="fade-up"
                                data-aos-delay="350" data-aos-duration="500" data-aos-easing="ease-in">
                                <div class="single-feature">
                                    <div class="part-icon">
                                        <img src="{{asset('bet/icon-6(1).png')}}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <span class="title">24/7 Friendly Support</span>
                                        <p>Our customer care team are ready to deal with betting issues and are
                                            available to
                                            talk to you 24/7. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature end -->

    <!-- testimonial begin -->
    <div class="testimonial">
        <div class="global-shape style-3">
            <img src="{{asset('bet/shape-1.png')}}" alt="" data-aos="fade-left" data-aos-duration="500"
                data-aos-offset="200" data-aos-easing="ease-in" data-aos-delay="400" class="aos-init">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500"
                    data-aos-easing="ease-in">
                    <div class="section-title">
                        <h3 class="sub-title">testimonials</h3>
                        <h2 class="title">Client’s Valuable Feedback</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-theme owl-loaded aos-init" data-aos="fade-up"
                data-aos-delay="150" data-aos-duration="500" data-aos-easing="ease-in">



                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transform: translate3d(-2496px, 0px, 0px); transition: all 0s linear 0s; width: 8736px;">
                        <div class="owl-item cloned" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Leah Stanley</span>
                                        <span class="lottery-category">Est. Returns : $425.20</span>
                                        <span class="winning-date">( Jan - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-2.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Since it’s all by chance, enjoy picking your numbers or seeing what the
                                        lottery terminal generates Since it’s all by chance.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Megan Clayton</span>
                                        <span class="lottery-category">Est. Returns : $99.51</span>
                                        <span class="winning-date">( Dec - 2021 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-3.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Since it’s all by chance, enjoy picking your numbers or seeing what the
                                        lottery terminal generates Since it’s all by chance.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">ruhio S albert</span>
                                        <span class="lottery-category">Est. Returns : $205.20</span>
                                        <span class="winning-date">( apr - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-1.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Since it’s all by chance, enjoy picking your numbers or seeing what the
                                        lottery terminal generates Since it’s all by chance.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Leah Stanley</span>
                                        <span class="lottery-category">Est. Returns : $425.20</span>
                                        <span class="winning-date">( Jan - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-2.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Since it’s all by chance, enjoy picking your numbers or seeing what the
                                        lottery terminal generates Since it’s all by chance.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Megan Clayton</span>
                                        <span class="lottery-category">Est. Returns : $99.51</span>
                                        <span class="winning-date">( Dec - 2021 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-3.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Since it’s all by chance, enjoy picking your numbers or seeing what the
                                        lottery terminal generates Since it’s all by chance.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">ruhio S albert</span>
                                        <span class="lottery-category">Est. Returns : $205.20</span>
                                        <span class="winning-date">( apr - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-1.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Since it’s all by chance, enjoy picking your numbers or seeing what the
                                        lottery terminal generates Since it’s all by chance.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 1248px;">
                            <div class="single-testimonial">
                                <div class="testi-user-info">
                                    <div class="part-user-info">
                                        <span class="user-name">Leah Stanley</span>
                                        <span class="lottery-category">Est. Returns : $425.20</span>
                                        <span class="winning-date">( Jan - 2022 )</span>
                                    </div>
                                    <div class="user-img-cover">
                                        <div class="part-img">
                                            <img src="{{asset('bet/user-2.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="part-feedback">
                                    <p><img class="quot-1" src="{{asset('bet/quot-icon-1.png')}}" alt="">
                                        Since it’s all by chance, enjoy picking your numbers or seeing what the
                                        lottery terminal generates Since it’s all by chance.
                                        <img class="quot-2" src="{{asset('bet/quot-icon-2.png')}}" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><img
                            src="{{asset('bet/left-arrow.png')}}"></button><button type="button" role="presentation"
                        class="owl-next"><img src="{{asset('bet/right-arrow.png')}}"></button></div>
                <div class="carousel-custom-dots"><button role="button"
                        class="owl-dot active"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button></div>
            </div>
        </div>
    </div>
    <!-- testimonial end -->

    @endsection
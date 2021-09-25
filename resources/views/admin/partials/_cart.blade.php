 
 @php $count = count((array) session('cart'));
 @endphp
 <a  style="    padding: 10px 5px 13px 10px;" href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
        role="button">
        <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>{{ $count }} 
                            </a>
    <ul class="dropdown-menu pullDown">
        <li class="body">
            @php $total = 0 @endphp
            @foreach((array) session('cart') as $id => $details)
           
                @php $total += $details['price'] * $details['quantity'] @endphp
            @endforeach
            <ul class="user_dw_menu">
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
               

                <li>
                    <a href="{{ route('products.show',encrypt($id)) }}" >
                        <span class="table-img msg-user">
                            @foreach (json_decode($details['image']) as $item)

                            @if($loop->first)   
                                <img src="{{ asset('uploads/'.$item) }}" width="30" height="30" alt="">
                            @endif
                            @endforeach
                        </span>
                        <span class="menu-info">
                         <span class="menu-title">{{ $details['name'] }}</span>
                          
                        </span>
                    </a>
                </li>
                @endforeach
               
               
                <li class="footer">
                    <a href="{{ route('cart') }}" > مشاهدة السلة </a>
                </li>
                @else
                <li class="footer">
                    <a >لا يوجد منتجات </a>
                </li>
                @endif
            
            </ul>
        </li>
    </ul>


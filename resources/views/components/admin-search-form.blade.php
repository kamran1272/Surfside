 <form class="form-search flex-grow">
     <fieldset class="name">
         <input type="text" placeholder="Search here..." class="show-search" name="name" tabindex="2" value=""
             aria-required="true" required="">
     </fieldset>
     <div class="button-submit">
         <button class="" type="submit"><i class="icon-search"></i></button>
     </div>
     <div class="box-content-search" id="box-content-search">
         <ul class="mb-24">
             <li class="mb-14">
                 <div class="body-title">Top selling product</div>
             </li>
             <li class="mb-14">
                 <div class="divider"></div>
             </li>
             <li>
                 <ul>
                     <li class="product-item gap14 mb-10">
                         <div class="image no-bg">
                             <img src="{{ asset('assets/admin/images/products/17.png') }}" alt="">
                         </div>
                         <div class="flex items-center justify-between gap20 flex-grow">
                             <div class="name">
                                 <a href="{{ url('/product-list') }}" class="body-text">Dog Food
                                     Rachael Ray Nutrish®</a>
                             </div>
                         </div>
                     </li>
                     <li class="mb-10">
                         <div class="divider"></div>
                     </li>
                     <li class="product-item gap14 mb-10">
                         <div class="image no-bg">
                             <img src="{{ asset('assets/admin/images/products/18.png') }}" alt="">
                         </div>
                         <div class="flex items-center justify-between gap20 flex-grow">
                             <div class="name">
                                 <a href="{{ url('/product-list') }}" class="body-text">Natural
                                     Dog Food Healthy Dog Food</a>
                             </div>
                         </div>
                     </li>
                     <li class="mb-10">
                         <div class="divider"></div>
                     </li>
                     <li class="product-item gap14">
                         <div class="image no-bg">
                             <img src="{{ asset('assets/admin/images/products/19.png') }}" alt="">
                         </div>
                         <div class="flex items-center justify-between gap20 flex-grow">
                             <div class="name">
                                 <a href="{{ url('/product-list') }}" class="body-text">Freshpet
                                     Healthy Dog Food and Cat</a>
                             </div>
                         </div>
                     </li>
                 </ul>
             </li>
         </ul>
         <ul class="">
             <li class="mb-14">
                 <div class="body-title">Order product</div>
             </li>
             <li class="mb-14">
                 <div class="divider"></div>
             </li>
             <li>
                 <ul>
                     <li class="product-item gap14 mb-10">
                         <div class="image no-bg">
                             <img src="{{ asset('assets/admin/images/products/20.png') }}" alt="">
                         </div>
                         <div class="flex items-center justify-between gap20 flex-grow">
                             <div class="name">
                                 <a href="{{ url('/product-list') }}" class="body-text">Sojos
                                     Crunchy Natural Grain Free...</a>
                             </div>
                         </div>
                     </li>
                     <li class="mb-10">
                         <div class="divider"></div>
                     </li>
                     <li class="product-item gap14 mb-10">
                         <div class="image no-bg">
                             <img src="{{ asset('assets/admin/images/products/21.png') }}" alt="">
                         </div>
                         <div class="flex items-center justify-between gap20 flex-grow">
                             <div class="name">
                                 <a href="{{ url('/product-list') }}" class="body-text">Kristin
                                     Watson</a>
                             </div>
                         </div>
                     </li>
                     <li class="mb-10">
                         <div class="divider"></div>
                     </li>
                     <li class="product-item gap14 mb-10">
                         <div class="image no-bg">
                             <img src="{{ asset('assets/admin/images/products/22.png') }}" alt="">
                         </div>
                         <div class="flex items-center justify-between gap20 flex-grow">
                             <div class="name">
                                 <a href="{{ url('/product-list') }}" class="body-text">Mega
                                     Pumpkin Bone</a>
                             </div>
                         </div>
                     </li>
                     <li class="mb-10">
                         <div class="divider"></div>
                     </li>
                     <li class="product-item gap14">
                         <div class="image no-bg">
                             <img src="{{ asset('assets/admin/images/products/23.png') }}" alt="">
                         </div>
                         <div class="flex items-center justify-between gap20 flex-grow">
                             <div class="name">
                                 <a href="{{ url('/product-list') }}" class="body-text">Mega
                                     Pumpkin Bone</a>
                             </div>
                         </div>
                     </li>
                 </ul>
             </li>
         </ul>
     </div>
 </form>

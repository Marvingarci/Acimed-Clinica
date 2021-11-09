<!DOCTYPE html>
<html lang="en">

<head>
    <title>Iniciar Sesión</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div>
        <div class="flex h-screen sm:grid sm:grid-cols-2 lg:grid-cols-3">
            <div class="hidden sm:grid bg-cover bg-center lg:col-span-2 bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600"
                style="background-image: url('img/caratula.jpg');">
            </div>

            <div class="w-screen sm:w-auto flex items-center bg-gray-100 px-10">
                <div class="flex flex-col w-full">
                    <!-- <img class="w-56 m-auto" src="img/icono.png"> -->
                    <div class="flex flex-row justify-center mb-5">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="h-60 w-60"
                            viewBox="0 0 1026.000000 1280.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#8B5CF6"
                                stroke="none">
                                <path d="M5012 12784 c-131 -35 -255 -130 -314 -240 -145 -270 -7 -614 285
-706 84 -27 210 -27 294 0 201 64 343 257 343 467 0 140 -46 251 -145 350
-121 121 -304 172 -463 129z" />
                                <path d="M3310 12755 c-198 -24 -340 -67 -487 -145 -226 -121 -444 -265 -993
-659 -728 -521 -1080 -735 -1570 -954 -216 -96 -260 -120 -260 -140 0 -32 48
-83 106 -113 90 -46 203 -60 364 -45 211 21 306 48 521 149 301 141 833 466
1159 707 123 91 319 284 378 371 51 77 69 95 86 88 11 -4 14 -34 14 -132 1
-196 41 -350 130 -496 53 -88 192 -224 276 -271 147 -82 255 -107 454 -106
131 0 132 0 132 -23 0 -12 -13 -35 -30 -51 -58 -56 -64 -141 -16 -249 110
-249 412 -463 699 -497 146 -17 343 16 467 78 l55 28 -3 150 c-6 361 -15 616
-22 620 -4 3 -43 -4 -86 -15 -243 -62 -448 -20 -577 120 -65 70 -104 147 -115
227 -13 99 -5 117 107 225 178 172 240 282 249 438 3 60 -1 105 -12 150 -33
128 -124 289 -212 373 -155 149 -466 215 -814 172z" />
                                <path d="M6565 12759 c-102 -13 -240 -55 -317 -96 -115 -62 -201 -162 -274
-316 -50 -107 -67 -186 -62 -287 9 -156 71 -266 249 -438 112 -108 120 -126
107 -225 -11 -80 -50 -157 -115 -227 -129 -140 -334 -182 -577 -120 -43 11
-82 18 -86 15 -7 -4 -16 -259 -22 -620 l-3 -150 55 -28 c124 -62 321 -95 467
-78 287 34 589 248 699 497 48 108 42 193 -16 249 -17 16 -30 39 -30 51 0 23
1 23 133 23 198 -1 306 24 453 106 84 47 223 183 276 271 89 146 129 300 130
496 0 170 12 175 100 44 59 -87 255 -280 378 -371 326 -241 858 -566 1159
-707 215 -101 310 -128 521 -149 161 -15 274 -1 364 45 58 30 106 81 106 113
0 20 -44 44 -260 140 -490 219 -842 433 -1570 954 -440 316 -566 402 -752 517
-181 113 -316 185 -394 212 -209 73 -505 105 -719 79z" />
                                <path d="M4807 11733 c-3 -5 -1 -163 4 -353 4 -190 13 -538 19 -775 6 -236 15
-603 20 -815 5 -212 14 -596 20 -855 6 -258 11 -494 13 -523 1 -33 -2 -52 -9
-52 -24 0 -253 75 -358 117 -272 109 -447 236 -557 402 -74 112 -101 205 -107
374 -5 170 -1 179 66 116 26 -25 59 -53 73 -62 100 -61 278 -76 391 -33 171
65 312 188 325 284 4 33 1 44 -27 75 -70 80 -205 121 -400 121 -273 0 -443
-63 -608 -226 -148 -146 -223 -320 -223 -518 1 -228 102 -442 304 -645 143
-143 285 -246 515 -375 l83 -47 -88 -64 c-107 -78 -252 -220 -316 -312 -222
-313 -256 -672 -101 -1040 104 -246 286 -446 608 -666 l87 -59 -80 -56 c-303
-212 -466 -420 -528 -673 -23 -97 -23 -293 1 -408 69 -332 247 -628 516 -860
l90 -78 -53 -56 c-173 -183 -257 -382 -257 -611 0 -320 126 -515 536 -827 l29
-22 -82 -76 c-199 -184 -283 -351 -283 -561 0 -153 45 -291 139 -427 65 -94
108 -136 116 -115 4 9 -5 84 -19 168 -30 174 -32 252 -11 333 23 90 60 152
140 236 71 74 230 199 241 188 5 -5 15 -333 34 -1192 7 -275 15 -558 18 -630
l7 -130 35 0 35 0 7 120 c3 66 11 347 18 625 19 839 29 1202 34 1207 12 12
136 -84 234 -180 56 -55 83 -92 115 -156 l42 -84 0 -121 c0 -85 -7 -158 -24
-244 -13 -67 -20 -129 -17 -139 6 -14 11 -12 36 12 43 42 127 165 156 231 51
116 67 198 62 324 -9 210 -85 355 -277 529 -45 40 -81 76 -81 80 0 5 39 38 88
74 338 255 472 474 473 777 0 226 -85 428 -258 611 l-53 56 99 86 c263 230
432 511 508 848 26 112 23 330 -6 434 -65 242 -220 437 -507 640 l-94 67 86
59 c166 114 336 259 420 359 121 145 222 349 261 530 26 123 24 356 -5 462
-69 255 -241 492 -485 667 l-88 64 109 61 c532 302 794 638 793 1015 -1 337
-258 642 -602 717 -107 23 -344 23 -429 1 -91 -24 -163 -62 -200 -104 -27 -31
-31 -42 -27 -74 13 -96 161 -225 330 -288 79 -29 213 -29 298 -1 76 26 101 42
161 98 25 24 51 41 57 38 20 -13 14 -232 -9 -322 -54 -215 -200 -382 -450
-517 -129 -69 -378 -164 -549 -208 -10 -3 -13 16 -12 96 2 123 51 2157 71
2919 5 193 7 354 4 358 -6 10 -641 11 -647 1z m112 -4800 c6 -313 14 -592 16
-622 5 -46 3 -52 -11 -47 -48 18 -141 91 -229 180 -152 153 -215 289 -215 461
0 154 51 273 174 402 63 67 221 190 247 192 3 1 11 -254 18 -566z m525 513
c141 -94 260 -231 307 -353 30 -80 37 -234 15 -322 -34 -134 -118 -262 -245
-374 -64 -57 -177 -137 -193 -137 -5 0 -6 17 -3 38 2 20 10 299 16 620 7 320
14 582 17 582 3 0 41 -24 86 -54z m-466 -2851 c5 -192 7 -352 6 -354 -5 -7
-129 87 -173 130 -113 114 -181 268 -181 414 0 167 67 289 242 442 l83 72 7
-177 c4 -97 11 -334 16 -527z m495 551 c48 -49 80 -95 109 -153 37 -74 42 -94
46 -170 9 -167 -55 -327 -179 -452 -43 -43 -168 -137 -172 -130 -2 2 3 209 9
459 7 250 13 488 13 528 l1 74 53 -43 c28 -24 83 -75 120 -113z m-455 -2224
c4 -144 5 -262 2 -262 -14 1 -116 144 -143 200 -25 54 -31 78 -31 140 -1 94
26 152 104 230 l55 55 3 -50 c1 -27 6 -168 10 -313z m311 292 c65 -74 86 -127
86 -214 0 -101 -30 -166 -140 -303 -16 -20 -32 -37 -35 -37 -3 0 -2 93 1 207
4 115 7 254 8 311 1 98 2 102 20 93 10 -6 37 -31 60 -57z" />
                                <path d="M2433 11673 c-17 -10 -89 -68 -160 -130 -500 -436 -903 -711 -1292
-882 -134 -60 -157 -82 -130 -129 22 -41 74 -61 192 -73 250 -25 424 29 777
238 329 196 765 525 804 608 17 35 17 36 -22 123 -35 76 -52 126 -82 232 -8
32 -44 37 -87 13z" />
                                <path d="M7740 11664 c-6 -14 -10 -31 -10 -38 0 -21 -36 -120 -75 -206 -36
-79 -36 -80 -19 -115 39 -83 475 -412 804 -608 353 -209 527 -263 777 -238
118 12 170 32 192 73 27 47 4 69 -130 129 -400 176 -791 446 -1353 933 -117
102 -167 121 -186 70z" />
                                <path d="M2660 11213 c-8 -4 -82 -71 -165 -151 -288 -279 -490 -431 -828 -626
l-118 -69 3 -35 c3 -33 7 -37 48 -50 62 -19 259 -21 340 -3 153 33 323 121
522 268 150 111 473 382 489 410 19 36 -1 64 -75 108 -37 21 -91 65 -121 97
-53 57 -64 62 -95 51z" />
                                <path d="M7506 11163 c-31 -33 -85 -77 -122 -98 -74 -44 -94 -72 -75 -108 16
-28 339 -299 489 -410 199 -147 369 -235 522 -268 81 -18 278 -16 340 3 41 13
45 17 48 50 l3 35 -118 69 c-341 197 -541 348 -829 627 -83 81 -162 149 -177
152 -22 6 -33 -1 -81 -52z" />
                                <path d="M3041 10946 c-13 -7 -37 -31 -53 -52 -99 -132 -292 -326 -531 -533
-119 -103 -133 -121 -117 -151 25 -48 128 -69 237 -50 288 50 823 504 823 700
0 16 -3 31 -7 33 -5 3 -53 10 -108 17 -54 6 -126 20 -160 31 -33 10 -60 19
-60 19 0 -1 -11 -7 -24 -14z" />
                                <path d="M7129 10940 c-31 -10 -101 -24 -155 -30 -54 -7 -102 -14 -106 -17 -5
-2 -8 -17 -8 -33 0 -196 535 -650 823 -700 109 -19 212 2 237 50 16 30 2 48
-117 151 -241 208 -437 406 -533 535 -23 32 -72 69 -83 63 -1 -1 -27 -9 -58
-19z" />
                            </g>
                        </svg>
                    </div>
                    <div class="mb-1">
                        <h1 class=" w-full text-center text-gray-700 font-bold font-gotica">
                            Medical Record
                        </h1>
                    </div>
                    <br>
                    <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full">
                        @csrf
                        <input type="text" name="email" placeholder="Correo Electrónico"
                            class="px-5 py-2 border-solid border-blue-400 rounded-2xl focus:outline-none"
                            value="{{ old('email') ? old('email') : '' }}">
                        @error('email')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <input type="password" name="password" placeholder="Contraseña"
                            class="px-5 py-2 border-solid border-blue-400 rounded-2xl focus:outline-none">
                        @error('password')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <button type="submit" class="px-5 py-2 text-white font-bold bg-purple-400 rounded-2xl">
                            Ingresar
                        </button>
                        <a href="{{ route('registrar') }}"
                            class="text-center mt-5 text-gray-400 hover:text-purple-400">Registrarme</a>
                    </form>

                </div>
            </div>
        </div>
    </div>


</body>

</html>
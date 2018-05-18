<?php

Route::prefix('Users')->group(function () {
\MS\Core\Helper\Comman::loadRoute('Users');
});



Route::prefix('Panel')->group(function () {
\MS\Core\Helper\Comman::loadRoute('Panel');
});




//\MS\Core\Helper\Comman::loadRoute('Role');

Route::prefix('MAS')->group(function () {

\MS\Core\Helper\Comman::loadRoute('MAS');


});


// Route::prefix('MM')->group(function () {

// \MS\Core\Helper\Comman::loadRoute('MM');

// });


// Route::prefix('CCM')->group(function () {


// \MS\Core\Helper\Comman::loadRoute('CCM');
// });

Route::prefix('PM')->group(function () {

\MS\Core\Helper\Comman::loadRoute('PM');

});


Route::prefix('IM')->group(function () {

\MS\Core\Helper\Comman::loadRoute('IM');

});


Route::prefix('IVR')->group(function () {

\MS\Core\Helper\Comman::loadRoute('IVR');
});



Route::prefix('BM')->group(function () { \MS\Core\Helper\Comman::loadRoute('BM'); });
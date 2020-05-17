<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('admin.home'));
});

/**
 * Dashboard
 * admin uests
 */
//index
Breadcrumbs::for('admin users', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Admins'), route('admin.admin_users.index'));
});
//create
Breadcrumbs::for('create admin user', function ($trail) {
    $trail->parent('admin users');
    $trail->push(__('Create Admin'), route('admin.admin_users.create'));
});
//update
Breadcrumbs::for('update admin user', function ($trail, $admin) {
    $trail->parent('admin users');
    $trail->push(__('Update').' ( '.$admin->name.' )', route('admin.admin_users.edit', $admin->id));
});

/**
 * Dashboard
 * Roles
 */
//index
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Roles'), route('admin.roles.index'));
});
//create
Breadcrumbs::for('create role', function ($trail) {
    $trail->parent('roles');
    $trail->push(__('Create Role'), route('admin.roles.create'));
});
//update
Breadcrumbs::for('update role', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push(__('Update').' ( '.$role->name.' )', route('admin.roles.edit', $role->id));
});


/**
 * Dashboard
 * Setting
 */
//index
Breadcrumbs::for('settings', function ($trail) {
    $trail->parent('home');
    $trail->push('Settings', route('admin.settings.index'));
});



/**
 * Dashboard
 * Contact
 */
Breadcrumbs::for('contacts',function($trail){
    $trail->parent('home');
    $trail->push('Contact Us',route('admin.contacts.index'));
});
Breadcrumbs::for('create contact',function($trail){
    $trail->parent('contacts');
    $trail->push('Create Contact',route('admin.contacts.create'));
});
Breadcrumbs::for('update contact',function($trail,$model){
    $trail->parent('contacts');
    $trail->push('Update'.' ( '.$model->name. ' ) ',route('admin.contacts.edit',$model->id));
});

/**
 * Dashboard
 * Slider
 */
Breadcrumbs::for('sliders',function($trail){
    $trail->parent('home');
    $trail->push('Slider',route('admin.sliders.index'));
});
Breadcrumbs::for('create slider',function($trail){
    $trail->parent('sliders');
    $trail->push('Create Slider',route('admin.sliders.create'));
});
Breadcrumbs::for('update slider',function($trail,$model){
    $trail->parent('sliders');
    $trail->push('Update'.' ( '.$model->name . ' ) ',route('admin.sliders.edit',$model->id));
});

/**
 * Dashboard
 * countries
 */
Breadcrumbs::for('countries',function($trail){
    $trail->parent('home');
    $trail->push('Countries',route('admin.countries.index'));
});
Breadcrumbs::for('create country',function($trail){
    $trail->parent('countries');
    $trail->push('Create Country',route('admin.countries.create'));
});
Breadcrumbs::for('update country',function($trail,$model){
    $trail->parent('countries');
    $trail->push('Update'.' ( '.$model->name . ' ) ',route('admin.countries.edit',$model->id));
});
/**
 * Dashboard
 * cities`
 */
Breadcrumbs::for('cities',function($trail,$model){
    $trail->parent('countries');
    $trail->push('Cities of '.$model->name ,route('admin.cities.index',$model));
});
Breadcrumbs::for('create city',function($trail,$model){
    $trail->parent('cities',$model);
    $trail->push('Create City',route('admin.cities.create',$model->id));
});
// Breadcrumbs::for('update city',function($trail,$model,$country){
//     $trail->parent('cities');
//     $trail->push('Update'.' ( '.$model->name . ' ) ',route('admin.cities.edit',[$country,$model->id]));
// });
/**
 * Dashboard
 * customers
 */
Breadcrumbs::for('customers',function($trail){
    $trail->parent('home');
    $trail->push('Customers',route('admin.customers.index'));
});
Breadcrumbs::for('create customer',function($trail){
    $trail->parent('customers');
    $trail->push('Create Customer',route('admin.customers.create'));
});
Breadcrumbs::for('update customer',function($trail,$model){
    $trail->parent('customers');
    $trail->push('Update'.' ( '.$model->first_name . ' ) ',route('admin.customers.edit',$model->id));
});

/**
 * Dashboard
 * Products
 */
Breadcrumbs::for('products',function($trail){
    $trail->parent('home');
    $trail->push('Products',route('admin.products.index'));
});
Breadcrumbs::for('create product',function($trail){
    $trail->parent('products');
    $trail->push('Create product',route('admin.products.create'));
});
Breadcrumbs::for('update product',function($trail,$model){
    $trail->parent('products');
    $trail->push('Update'.' ( '.$model->name . ' ) ',route('admin.products.edit',$model->id));
});


/**
 * Dashboard
 * USer address
 */
Breadcrumbs::for('address',function($trail){
    $trail->parent('home');
    $trail->push('User Address',route('admin.address.index'));
});
Breadcrumbs::for('create address',function($trail){
    $trail->parent('address');
    $trail->push('Create User Address',route('admin.address.create'));
});
Breadcrumbs::for('update address',function($trail,$model){
    $trail->parent('address');
    $trail->push('Update'.' ( '.$model->name . ' ) ',route('admin.address.edit',$model->id));
});

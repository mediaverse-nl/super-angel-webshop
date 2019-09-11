<?php

$edit_name = 'Edit';
$create_name = 'Create';
$show_name = 'Show';

// admin dashboard
Breadcrumbs::for('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('home'));
});

// admin text index
Breadcrumbs::for('admin.editor.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Text', route('admin.editor.index'));
});
// admin text edit
Breadcrumbs::for('admin.editor.edit', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.editor.index');
    $breadcrumbs->push($edit_name, route('admin.editor.edit', $model->id));
});

// admin user index
Breadcrumbs::for('admin.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Users', route('admin.user.index'));
});
// admin user edit
Breadcrumbs::for('admin.user.edit', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push($edit_name, route('admin.user.edit', $model->id));
});

// admin detail index
Breadcrumbs::for('admin.detail.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Details', route('admin.detail.index'));
});
// admin detail edit
Breadcrumbs::for('admin.detail.edit', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.detail.index');
    $breadcrumbs->push($edit_name, route('admin.detail.edit', $model->id));
});
// dashboard > detail > create
Breadcrumbs::for('admin.detail.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.detail.index');
    $breadcrumbs->push($create_name, route('admin.detail.create'));
});

// admin order index
Breadcrumbs::for('admin.order.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Orders', route('admin.order.index'));
});
// admin order edit
Breadcrumbs::for('admin.order.edit', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.order.index');
    $breadcrumbs->push($edit_name, route('admin.order.edit', $model->id));
});

// dashboard > faq
Breadcrumbs::for('admin.faq.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('FAQ', route('admin.faq.index'));
});
// dashboard > faq > edit
Breadcrumbs::for('admin.faq.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push($edit_name, route('admin.faq.edit', $model->id));
});
// dashboard > faq > create
Breadcrumbs::for('admin.faq.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push($create_name, route('admin.faq.create'));
});

// dashboard > product
Breadcrumbs::for('admin.product.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Products', route('admin.product.index'));
});
// dashboard > product > edit
Breadcrumbs::for('admin.product.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push($edit_name, route('admin.product.edit', $model->id));
});
// dashboard > product > create
Breadcrumbs::for('admin.product.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.product.index');
    $breadcrumbs->push($create_name, route('admin.product.create'));
});

// dashboard > activity
Breadcrumbs::for('admin.activity.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Activity', route('admin.activity.index'));
});
// dashboard > activity > edit
Breadcrumbs::for('admin.activity.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.activity.index');
    $breadcrumbs->push($edit_name, route('admin.activity.edit', $model->id));
});
// dashboard > activity > create
Breadcrumbs::for('admin.activity.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.activity.index');
    $breadcrumbs->push($create_name, route('admin.activity.create'));
});

// dashboard > event
Breadcrumbs::for('admin.seo-manager.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('SEO manager', route('admin.seo-manager.index'));
});
// dashboard > event > edit
Breadcrumbs::for('admin.seo-manager.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.seo-manager.index');
    $breadcrumbs->push($edit_name, route('admin.seo-manager.edit', $model->id));
});

// dashboard > event
Breadcrumbs::for('admin.event.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Events', route('admin.event.index'));
});
// dashboard > event > edit
Breadcrumbs::for('admin.event.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.event.index');
    $breadcrumbs->push($edit_name, route('admin.event.edit', $model->id));
});
// dashboard > event > create
Breadcrumbs::for('admin.event.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.event.index');
    $breadcrumbs->push($create_name, route('admin.event.create'));
});

// dashboard > category
Breadcrumbs::for('admin.category.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Category', route('admin.category.index'));
});
// dashboard > category > edit
Breadcrumbs::for('admin.category.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.category.index');
    $breadcrumbs->push($edit_name, route('admin.category.edit', $model->id));
});
// dashboard > category > create
Breadcrumbs::for('admin.category.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.category.index');
    $breadcrumbs->push($create_name, route('admin.category.create'));
});

// dashboard > images
Breadcrumbs::for('admin.image.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Images Library', route('admin.file-manager.index'));
});

// dashboard > notification
Breadcrumbs::for('admin.notification.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Notification', route('admin.notification.index'));
});
// dashboard > notification > show
Breadcrumbs::for('admin.notification.show', function($breadcrumbs, $model) use ($show_name) {
    $breadcrumbs->parent('admin.notification.index');
    $breadcrumbs->push($show_name, route('admin.notification.show', $model->id));
});

//site breadcrumbs
Breadcrumbs::for('home', function ($breadcrumbs) {
    $breadcrumbs->push("home", route('home'));
});

//site about
Breadcrumbs::for('site.about', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push("Over ons", route('site.about'));
});
//site contact
Breadcrumbs::for('site.contact', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push("Contact", route('site.contact.index'));
});
//site faq
Breadcrumbs::for('site.faq', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push("F.A.Q.", route('site.faq'));
});

// site category index
Breadcrumbs::for('site.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Categorieën', route('site.category.index'));
});
// site category show
Breadcrumbs::for('site.category.show', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('site.category.index');
    $breadcrumbs->push($model->value, route('site.category.show', $model->id));
});

// site category event show
Breadcrumbs::for('site.activity.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('site.category.show', $model->activity->category);
    $breadcrumbs->push($model->activity->title, route('site.activity.show', [$model->title, $model->id]));
});


// auth panel
Breadcrumbs::for('auth.panel', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Paneel', route('auth.panel'));
});
// auth account edit
Breadcrumbs::for('auth.account.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('auth.panel');
    $breadcrumbs->push('account wijzigen', route('auth.account.edit'));
});
// auth order index
Breadcrumbs::for('auth.order.index', function ($breadcrumbs) {
    $breadcrumbs->parent('auth.panel');
    $breadcrumbs->push('bestelling(en)', route('auth.order.index'));
});
// auth order show
Breadcrumbs::for('auth.order.show', function ($breadcrumbs, $model) {
    $breadcrumbs->parent('auth.order.index');
    $breadcrumbs->push('Bestelling: '.$model->id, route('auth.order.show', $model->id));
});
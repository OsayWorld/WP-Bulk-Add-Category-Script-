function add_toyota_categories() {
    // Parent category
    $parent_cat = wp_insert_term(
        'Toyota', // The term
        'product_cat', // The taxonomy
        array(
            'description' => 'Toyota car models',
            'slug'        => 'toyota'
        )
    );

    // Check if parent category was created successfully
    if (is_wp_error($parent_cat)) {
        $parent_cat_id = term_exists('Toyota', 'product_cat')['term_id'];
    } else {
        $parent_cat_id = $parent_cat['term_id'];
    }

    // List of Toyota models
    $toyota_models = array(
        'Toyota Corolla',
        'Toyota Camry',
        'Toyota Prius',
        'Toyota RAV4',
        'Toyota Highlander',
        'Toyota 4Runner',
        'Toyota Tacoma',
        'Toyota Tundra',
        'Toyota Sienna',
        'Toyota Avalon',
        'Toyota Yaris',
        'Toyota C-HR',
        'Toyota Land Cruiser',
        'Toyota Sequoia',
        'Toyota Venza',
        'Toyota Supra',
        'Toyota Mirai',
        'Toyota Fortuner',
        'Toyota Hilux',
        'Toyota FJ Cruiser'
    );

    // Add each Toyota model as a subcategory
    foreach ($toyota_models as $model) {
        wp_insert_term(
            $model, // The term
            'product_cat', // The taxonomy
            array(
                'parent'      => $parent_cat_id,
                'slug'        => sanitize_title($model)
            )
        );
    }
}

// Hook into 'init' to run the function when WordPress initializes
add_action('init', 'add_toyota_categories');

<?php

/* Template Name: Shocal dashboard */

wp_enqueue_style(
    'buefy',
    'https://unpkg.com/buefy/dist/buefy.min.css',
    array(),
    null
);

wp_enqueue_style(
    'fontawesome',
    'https://use.fontawesome.com/releases/v5.2.0/css/all.css',
    array(),
    null
);

wp_enqueue_style(
    'material-design-icons',
    'https://cdn.jsdelivr.net/npm/@mdi/font@5.8.55/css/materialdesignicons.min.css',
    array(),
    null
);

wp_register_script(
    'vue',
    'https://cdn.jsdelivr.net/npm/vue@2',
    array(),
    null
);

wp_register_script(
    'buefy',
    'https://unpkg.com/buefy/dist/buefy.min.js',
    array(),
    null
);

wp_enqueue_script(
    'shocal-dashboard',
    get_theme_file_uri('/shocal-dashboard.js'),
    array('vue', 'buefy'),
    null,
    true // in footer
);

get_header(); ?>

<div style="background: #fff; padding: var(--global--spacing-vertical) 0;">
    <div class="container" id="app">
        <b-table
            :data="latest"
            paginated
            per-page="20"
            :current-page.sync="currentPage"
            :pagination-simple="false"
            :pagination-rounded="true"
            :sort-icon="sortIcon"
            :sort-icon-size="sortIconSize"
            :default-sort-direction="defaultSortDirection"
            default-sort="created"
            detailed
            aria-next-label="Next page"
            aria-previous-label="Previous page"
            aria-page-label="Page"
            aria-current-label="Current page"
        >
            <b-table-column
                field="orderID"
                label="ID"
                width="100"
                sortable
                searchable
                v-slot="props"
            >
                {{ props.row.orderID }}
            </b-table-column>

            <b-table-column
                field="created"
                label="Date"
                sortable
                centered
                searchable
                :custom-sort="sortByDate"
                v-slot="props"
            >
                <span class="tag is-primary">
                {{ new Date(props.row.created).toLocaleString() }}
                </span>
            </b-table-column>

            <b-table-column
                field="customer.fullname"
                label="Name"
                sortable
                searchable
                v-slot="props"
            >
                {{ props.row.customer.fullname }}
            </b-table-column>

            <b-table-column
                field="vendors.store_name"
                label="Vendor"
                sortable
                searchable
                v-slot="props"
            >
                <b-tooltip position="is-bottom" type="is-dark">
                {{props.row.vendors.store_name}}
                <template v-slot:content> {{props.row.vendors.address}} </template>
                </b-tooltip>
            </b-table-column>

            <b-table-column
                field="peepl.basket_size"
                label="Cost"
                sortable
                searchable
                v-slot="props"
            >
                {{props.row.peepl.basket_size}}
            </b-table-column>

            <b-table-column
                field="peepl.token_size"
                label="Reward"
                sortable
                searchable
                v-slot="props"
            >
                {{Math.floor(props.row.peepl.token_size * 1000)/100}} PPL
            </b-table-column>

            <template #detail="props">
                <b-tag type="is-primary"
                >Delivery Slot: {{props.row.tracking.delivery_slot}}</b-tag
                >
                <b-tag v-if="props.row.tracking.late==true" type="is-danger"
                >Late</b-tag
                >
                <b-tag v-else type="is-success">On Time</b-tag>
                <b-tag type="is-primary">{{props.row.tracking.mileage}} miles</b-tag>
                <b-tag type="is-primary">{{props.row.tracking.type}}</b-tag>
                <b-tag v-if="props.row.tracking.completed==true" type="is-success"
                >Completed</b-tag
                >
                <b-tag v-else type="is-danger">Not Completed</b-tag>
                <br /><br />
                <b-tag type="is-primary">{{props.row.customer.email}}</b-tag>
                <b-tag type="is-primary">Zone: {{props.row.customer.zone}}</b-tag>
                <b-tag type="is-primary">{{props.row.peepl.wallet_id}}</b-tag>
            </template>
        </b-table>

    </div>
</div>

<?php get_footer();

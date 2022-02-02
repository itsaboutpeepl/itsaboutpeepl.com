<?php /* Template Name: Shocal */ ?>

<head>
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css" />
  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
  />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@mdi/font@5.8.55/css/materialdesignicons.min.css"
  />
  <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>
</head>

<?php get_header(); ?>

<body>
    <b-navbar>
        <b-navbar-item><h3 class="title"></h3></b-navbar-item>
    </b-navbar>
  <div class="container" id="app">
    <h1 class="title">Dashboard</h1>
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
  <script>
    var app = new Vue({
      el: "#app",
      data: {
        latest: [],
        currentPage: 1,
        defaultSortDirection: "desc",
        sortIcon: "arrow-up",
        sortIconSize: "is-small",
        columns: [
          {
            field: "orderID",
            label: "Order No.",
            numeric: true,
          },
          {
            field: "customer.fullname",
            label: "Customer",
          },
          {
            field: "created",
            label: "Date",
            searchable: true,
          },
        ],
      },
      methods: {
        fetchLatest() {
          fetch(
            "https://www.shocal.org/developers/apis/peepl/v1/data?apikey=Xau08wz65Sd12BaX5lU6B1W0lHyMD52167q5i"
          )
            .then((response) => response.json())
            .then((data) => {
              this.latest = data.result;
            });
        },
        sortByDate(b, a, isAsc) {
          if (isAsc) {
            return (
              new Date(b.created).getTime() - new Date(a.created).getTime()
            );
          } else {
            return (
              new Date(a.created).getTime() - new Date(b.created).getTime()
            );
          }
        },
      },
      beforeMount() {
        this.fetchLatest();
      },
    });
  </script>
</body>

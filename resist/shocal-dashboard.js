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

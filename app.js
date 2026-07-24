// ----------------------
// DATOS DE OFERTAS
// ----------------------
const travelOffers = [
  {
    id: 1,
    type: "vuelo",
    title: "Vuelo a París",
    destination: "París",
    price: 1200,
    rating: 4.8,
    dates: "2026-07-10 al 2026-07-20"
  },
  {
    id: 2,
    type: "hotel",
    title: "Hotel en Nueva York",
    destination: "Nueva York",
    price: 900,
    rating: 4.6,
    dates: "2026-08-01 al 2026-08-10"
  },
  {
    id: 3,
    type: "paquete",
    title: "Paquete Tokio 7 días",
    destination: "Tokio",
    price: 2500,
    rating: 4.9,
    dates: "2026-09-05 al 2026-09-12"
  }
];

// ----------------------
// RENDERIZAR CARDS
// ----------------------
function renderPackages(list) {
  const container = document.getElementById("resultCards");
  container.innerHTML = "";

  list.forEach(pkg => {
    const card = document.createElement("div");
    card.className = "col-md-4";

    card.innerHTML = `
      <div class="card shadow-sm border-0 h-100">
        <div class="card-body">
          <h5 class="card-title">${pkg.title}</h5>
          <p class="card-text text-muted">${pkg.destination}</p>
          <p class="fw-bold text-primary">$${pkg.price}</p>
          <p class="small">⭐ ${pkg.rating}</p>
          <p class="small text-muted">${pkg.dates}</p>
        </div>
      </div>
    `;

    container.appendChild(card);
  });
}

// ----------------------
// FILTROS RÁPIDOS
// ----------------------
document.querySelectorAll(".filter-btn").forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelectorAll(".filter-btn").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    const dest = btn.dataset.destination;

    if (dest === "") {
      renderPackages(travelOffers);
    } else {
      const filtered = travelOffers.filter(pkg => pkg.destination === dest);
      renderPackages(filtered);
    }
  });
});

// ----------------------
// NOTIFICACIONES EN TIEMPO REAL
// ----------------------
const notifications = [
  { title: "Oferta París", text: "Vuelos desde $899", variant: "primary" },
  { title: "Hotel en Tokio", text: "30% de descuento", variant: "success" },
  { title: "Vuelo Nueva York", text: "Últimos asientos disponibles", variant: "warning" }
];

function showToast(title, message, variant = "primary") {
  const area = document.getElementById("notificationArea");
  const toastId = `toast-${Date.now()}`;

  const toast = document.createElement("div");
  toast.className = `toast align-items-center text-bg-${variant} border-0`;
  toast.role = "alert";
  toast.id = toastId;

  toast.innerHTML = `
    <div class="d-flex">
      <div class="toast-body">
        <strong>${title}</strong><br>${message}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  `;

  area.appendChild(toast);

  const bsToast = new bootstrap.Toast(toast, { delay: 6000 });
  bsToast.show();

  toast.addEventListener("hidden.bs.toast", () => toast.remove());
}

function addLiveAlert(notification) {
  const list = document.getElementById("liveAlerts");
  const item = document.createElement("li");

  item.className = "list-group-item";
  item.innerHTML = `
    <strong>${notification.title}</strong>
    <p class="mb-0 small text-muted">${notification.text}</p>
  `;

  list.prepend(item);

  while (list.children.length > 5) {
    list.removeChild(list.lastChild);
  }
}

function cycleNotifications() {
  let index = 0;
  setInterval(() => {
    const n = notifications[index % notifications.length];
    showToast(n.title, n.text, n.variant);
    addLiveAlert(n);
    index++;
  }, 8000);
}

// ----------------------
// INICIALIZACIÓN
// ----------------------
document.addEventListener("DOMContentLoaded", () => {
  renderPackages(travelOffers);
  cycleNotifications();
});

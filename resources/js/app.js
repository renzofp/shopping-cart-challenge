// update cart item quantity
document.querySelectorAll('.quantity-form').forEach(form => {
    const itemId = form.dataset.id;
    const display = form.querySelector('.quantity-display');
    const totalDisplay = form.querySelector('.item-total');
    const btnDecrease = form.querySelector('.decrease-btn');
    const btnIncrease = form.querySelector('.increase-btn');

    const setLoadingState = (isLoading) => {
        btnDecrease.disabled = isLoading;
        btnIncrease.disabled = isLoading;
        form.classList.toggle('loading', isLoading);
    };

    const updateQuantity = (newQty) => {
        setLoadingState(true);

        fetch(`/cart/update/${itemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getToken(),
                'Accept': 'application/json',
            },
            body: JSON.stringify({ quantity: newQty })
        })
        .then(res => {
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            return res.json();
        })
        .then(data => {
            display.textContent = data.quantity;
            totalDisplay.textContent = `$${data.line_total}`;
            document.getElementById('subtotal').textContent = `$${data.subtotal}`;
            document.getElementById('gst').textContent = `$${data.gst}`;
            document.getElementById('qst').textContent = `$${data.qst}`;
            document.getElementById('total').textContent = `$${data.total}`;
        })
        .catch(err => {
            console.error('Failed to update cart:', err);
        })
        .finally(() => setLoadingState(false));
    };

    btnIncrease.addEventListener('click', () => {
        const current = parseInt(display.textContent);
        updateQuantity(current + 1);
    });

    btnDecrease.addEventListener('click', () => {
        const current = parseInt(display.textContent);
        if (current > 1) updateQuantity(current - 1);
    });
});

// delete item
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', () => {
        const itemContainer = button.closest('.card');
        const itemId = itemContainer.dataset.id;
        const csrfToken = getToken();

        disableWhileLoading(button);

        fetch(`/cart/delete/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(res => {
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            return res.json();
        })
        .then(data => {
            if (data.success) {
                itemContainer.remove();
                document.getElementById('subtotal').textContent = `$${data.subtotal}`;
                document.getElementById('gst').textContent = `$${data.gst}`;
                document.getElementById('qst').textContent = `$${data.qst}`;
                document.getElementById('total').textContent = `$${data.total}`;
            }
        })
        .catch(err => {
            console.error('Error deleting item:', err);
            button.disabled = false;
            button.classList.remove('loading');
        });
    });
});

// disable button while loading change
const disableWhileLoading = (button) => {
    button.disabled = true;
    button.classList.add('loading');
};

// get csrf token
const getToken = () => document.querySelector('meta[name="csrf-token"]').getAttribute('content');
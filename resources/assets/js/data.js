let cart = {
    cart: null,

    total: 0,

    fetchCart : function () {
        axios.get('/api/cart')
            .then(response => {
                this.cart = response.data
                this.total()
            })
    },

    total: function () {
        let total
        if (!this.cart || !this.cart.items.length) {
            total = 0
        }
        else {
            total = 0
            this.cart.items.forEach(item => {
                // console.log(item)
                total += item.product.price * item.qty
            })
        }

        this.total = total

    },

    addItems (item, qty) {
        axios.post('/api/cart', {
            item: item.id,
            qty: qty
        }).then(response => {
            console.log(response)
        })
    }

}

export default cart

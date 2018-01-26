import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex)


export default new Vuex.Store({
	strict: true,
	state: {
		today: new Date(),
		
		products: [],
		cart: {
			products: {},
			customer: []
		},

		weeklyCharge: 0,
		movingCharge: 0,
		extrasCharge:0
		
		,
		
	},
	mutations: {
		INIT_PRODUCTS: function(state, products){
			Vue.set(state, 'products', products)
		},
		UPDATE_CART_PRODUCTS: function(state,payload){
			// Use Vue set because we may be creating new properties
			// and we need them to be reactive
			// 
			// if qty is zero then remove product
			if(!payload.qty){
				Vue.delete(state.cart.products,payload.id)
			} else {
				Vue.set(state.cart.products,payload.id,payload)	
			}
				
		},
		
		
		
	},
	getters: {
		getCartProductQuantity: (state) => (id) =>{
		  if(state.cart.products.hasOwnProperty(id) ){
		    return state.cart.products[id].qty
		  }
		 return 0
		},
		getCost: (state) => {
			let total ={weekly:0,fixed:0}
			for(let key in state.cart.products){
				if(state.cart.products[key].code.startsWith('M') || state.cart.products[key].code.startsWith('I')){
					total.weekly += (state.cart.products[key].price * state.cart.products[key].qty)
				}
				if(state.cart.products[key].code.startsWith('E') ){
					total.fixed += (state.cart.products[key].price * state.cart.products[key].qty)
				}

				
			}
			return total
		},
		
		
		
	},
	actions: {
		initStore(context,products){
			// console.log('DATA',products)
			// iterate through products to add qty property
			var productsWithCost = _.map(products, function(product) { 
			     return _.extend({}, product, {qty: 0});
			}); 
			context.commit('INIT_PRODUCTS',productsWithCost)
		},
		incrementProductQty(context,product){
			let currentQty = 0
			if(context.state.cart.products.hasOwnProperty(product.id)){
				// get the current qty from the cart
				currentQty = context.state.cart.products[product.id].qty
			} 
			currentQty++
			let payload = {id: product.id, code: product.options[0].code,qty:currentQty,price: product.options[0].price}
			context.commit('UPDATE_CART_PRODUCTS',payload)
		},
		decrementProductQty(context,product){
			let currentQty = 0
			if(context.state.cart.products.hasOwnProperty(product.id)){
				// get the current qty from the cart
				currentQty = context.state.cart.products[product.id].qty
			}
			if(currentQty > 0){
				currentQty--
			}
			let payload = {id: product.id, code: product.options[0].code,qty:currentQty,price: product.options[0].price}
			context.commit('UPDATE_CART_PRODUCTS',payload)
		},
		setProductQty(context,payload){
			if(payload.qty < 1){
				payload.qty = 0
			}
			
			let mutationPayload = {id: payload.product.id, code: payload.product.options[payload.option].code,qty:payload.qty,price: payload.product.options[payload.option].price}

			context.commit('UPDATE_CART_PRODUCTS',mutationPayload)
			
		},

		updateCartProducts(context,payload){
			context.commit('UPDATE_CART_PRODUCTS',payload)
		}


	}
})

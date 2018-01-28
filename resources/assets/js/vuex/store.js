import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex)


export default new Vuex.Store({
	strict: true,
	state: {
		today: new Date(),
		service: false,
		
		//products: [],
		cart: {
			products: {},
			customer: []
		},
		
	},
	mutations: {

		SET_SERVICE: function(state,service){
			state.service = service
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
		getService: (state) => {
			return state.service
		},
		getCartProductQuantity: (state) => (id) =>{
		  if(state.cart.products.hasOwnProperty(id) ){
		    return state.cart.products[id].qty
		  }
		 return 0
		},
		getCost: (state) => {
			let total ={weekly:0,fixed:0}
			for(let key in state.cart.products){
				if(state.cart.products[key].payment_code =='w'){ // w= WEEKLY
					total.weekly += (state.cart.products[key].price * state.cart.products[key].qty)
				}
				if(state.cart.products[key].payment_code =='f' ){ //f= FIXED
					total.fixed += (state.cart.products[key].price * state.cart.products[key].qty)
				}				
			}
			return total
		},
		
		
		
	},
	actions: {
			
		setProductQty(context,payload){
			if(payload.qty < 1){
				payload.qty = 0
			}
			
			let mutationPayload = {id: payload.id,qty:payload.qty,payment_code: payload.payment_code, price: payload.price}

			context.commit('UPDATE_CART_PRODUCTS',mutationPayload)
			
		},

		updateCartProducts(context,payload){
			context.commit('UPDATE_CART_PRODUCTS',payload)
		}


	}
})

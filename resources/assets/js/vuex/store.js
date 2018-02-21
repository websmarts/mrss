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
			// delete any items in cart that belong to the unselecetd service
			let productGroup = 'removal-module'

			if(service == 'removal'){
				productGroup = 'storage-module'
			}
			_.each(_.filter(PRODUCTS,['product_group',productGroup]), function(p){
					Vue.delete(state.cart.products,p.id)
				});
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
				key = parseInt(key) // must be int
				let product = _.find(PRODUCTS,['id',parseInt(key)])
				if( product ){
				 
					if(product.payment_period =='weekly'){ // w= WEEKLY
						total.weekly += (state.cart.products[key].ext_price) //  * state.cart.products[key].qty
					}
					if(product.payment_period =='once off' ){ //f= FIXED
						total.fixed += (state.cart.products[key].ext_price ) // * state.cart.products[key].qty
					}	
				}						
			}
			return total
		},
		getCartProducts: (state) => (product_group) => {
			// Get list of all products of product_group
			let products = _.filter(PRODUCTS,['product_group',product_group]);

			// Now get any of the products that are in the cart
			let cartItems=[]
			products.forEach(function(product){
				if(state.cart.products.hasOwnProperty(product.id)){
					cartItems.push(state.cart.products[product.id])
				}
			})

			return cartItems
		}
		
		
		
	},
	actions: {
			
		setProductQty(context,payload){
			if(payload.qty < 1){
				payload.qty = 0
			}
			
			let mutationPayload = {id: payload.id,qty:payload.qty,ext_price: payload.ext_price,price: payload.price}

			context.commit('UPDATE_CART_PRODUCTS',mutationPayload)
			
		},

		updateCartProducts(context,payload){
			context.commit('UPDATE_CART_PRODUCTS',payload)
		}


	}
})

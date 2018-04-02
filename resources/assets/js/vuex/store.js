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
			customer: [],
			pickupLocation: {id: 0},
			returnLocation: {id: 0}	
		},
		
	},
	mutations: {

		SET_SERVICE: function(state,service){
			state.service = service
			//  delete any items in cart that belong to the unselecetd service
			let productGroup = 'removal-module'

			if(service == 'removal'){
				productGroup = 'storage-module'
			}
			_.each(_.filter(PRODUCTS,['product_group',productGroup]), function(p){
					Vue.delete(state.cart.products,p.id)
				});
		},
		
		UPDATE_CART_PRODUCTS: function(state,option){
			// Use Vue set because we may be creating new properties
			// and we need them to be reactive
			// 
			// if qty is zero then remove product
			if(!option.qty_ordered){
				Vue.delete(state.cart.products,option.product_id)
			} else {

				Vue.set(state.cart.products,option.product_id,option)	
			}
				
		},
		UPDATE_PICKUP_LOCATION: function(state,location){
			state.cart.pickupLocation = location
		},
		UPDATE_RETURN_LOCATION: function(state,location){
			state.cart.returnLocation = location
		}

		
		
		
	},
	getters: {
		getService: (state) => {
			return state.service
		},
		getCartProductQuantity: (state) => (id) =>{
		  if(state.cart.products.hasOwnProperty(id) ){
		    return state.cart.products[id].qty_ordered * state.cart.products[id].qty
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
		getLocationPremium: (state) => {
			let premium = {pickup:0,return:0};

			// Premium is the combo of the two locations service premium
			
			let location = _.find(LOCATIONS,{id: state.cart.pickupLocation})
			if(location){	
				premium.pickup = parseFloat(location.service_premium)
			}

			location = _.find(LOCATIONS,{id: state.cart.returnLocation})
			if(location){	
				premium.return= parseFloat(location.service_premium)
			}

			
		 	return premium
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

		updateCartProducts(context,option){
			option.ext_price = option.qty_ordered * option.price
			// console.log('option',option)
			context.commit('UPDATE_CART_PRODUCTS',option)
		},

		updatePickupLocation(context, location){
			// console.log('action location',location)
			context.commit('UPDATE_PICKUP_LOCATION',location)
		},
		updateReturnLocation(context, location){
			context.commit('UPDATE_RETURN_LOCATION',location)
		},


	}
})

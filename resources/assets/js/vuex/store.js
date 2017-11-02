import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex)


export default new Vuex.Store({
	strict: true,
	state: {
		today: new Date(),
		
		products: [],
		weeklyCharge: 0,
		movingCharge: 0,
		extrasCharge:0
		
		,
		
	},
	mutations: {
		INIT_PRODUCTS: function(state, products){
			Vue.set(state, 'products', products)
		},
		INCREMENT_PRODUCT_QTY: function(state, product){
			product.qty += 1
		},
		DECREMENT_PRODUCT_QTY: function(state, product){
			product.qty > 0 ? product.qty -= 1 : 0
		}
		
		
	},
	getters: {
		
		
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
			context.commit('INCREMENT_PRODUCT_QTY',product)
		},
		decrementProductQty(context,product){
			if(product.qty > 0){
				context.commit('DECREMENT_PRODUCT_QTY',product)
			}
			
		},


	}
})

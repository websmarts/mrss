

<script>
import ProductBase from './ProductBase.vue';
export default {
  extends: ProductBase,
  methods: {
    chargeCost() {
      // calc the charge cost for this type of product
    }
  },
  computed: {
    cost() {
      
      return this.product.price * this.product.qty *2
    }
  },
 
}

</script>

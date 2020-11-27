<?php
require_once('../Classes/dbClass.php');
require_once('../Assets/header.php');
$eventId = $_GET['event_id'];
$db = new DB();


$get_event_query = "SELECT * FROM events WHERE event_id={$eventId}";
$the_event = $db->pdo->query($get_event_query)->fetch(PDO::FETCH_ASSOC);
$eventId = $the_event["event_id"];
$eventName = $the_event["event_name"];
$eventPrice = (int)$the_event["event_price"];

$data =  [
    "id" => (int)$eventId,
    "title" => $eventName,
    "itemPrice" => $eventPrice,
    "qty" => 22  
];
$formattedData = json_encode($data);
$filename = 'data.json';

//open or create the file
$handle = fopen($filename,'w+');

//write the data into the file
fwrite($handle,$formattedData);

//close the file
fclose($handle);

?>


    

    
          <?php
$get_event_query = "SELECT * FROM events WHERE event_id={$eventId}";
$the_event = $db->pdo->query($get_event_query)->fetch(PDO::FETCH_ASSOC);

?>
            

    <div id="eventsection">
                <h3>What</h3>
                
                <?php echo "<h5 id='event_name'>" . $the_event['event_name']. "</h5"; ?></h5>
                <p><?php echo $the_event['event_description']; ?></p><br />
                <?php echo "<h4 id='event_price'>" . "Costs: " . $the_event['event_price']; ?> 
                <h3>Where</h3>
                <?php
              
                    $location_query = "SELECT event_location FROM events WHERE event_id = $eventId";
                    $location_result = $db->pdo->query($location_query)->fetchColumn();
                    $location = $location_result;
                    echo "<h4>  $location </h4>";
                ?>
                 <br />
                
                
                </form>
            </div>
    	</div>
    </div>

    <footer class="page-footer blue">
    	<div class="container">
        <main>
        <section id="products"></section>
        <section id="cart">
        
        <div id="formend"></div>
    </main>    
    
    		<div class="row">
    			<div class="col l6 s12">
    			</div>
				
			</div>
		</div>
	</footer>

</body>
<script>
var qty = '';
    const CART = {
            KEY: 'Localhost',
            contents: [],
            
            init(){
                let _contents = localStorage.getItem(CART.KEY);
   
                if(_contents){
                    CART.contents = JSON.parse(_contents);
              
                }
                
            },
            async sync(){
                let _cart = JSON.stringify(CART.contents);
                await localStorage.setItem(CART.KEY, _cart);
                
            },
            find(id){
                let match = CART.contents.filter(item=>{
                    if(item.id == id)
                        return true;
                });
                if(match && match[0])
                    return match[0];
            },
            add(id){
                let PRODUCTS = JSON.parse(<?php echo json_encode($formattedData);?>);
                if(CART.find(id)){
                    CART.increase(id, 1);
                }else{
                    let productid = PRODUCTS.id;
                        if(productid == id){
                            let obj = {
                            id: PRODUCTS.id,
                            title: PRODUCTS.title,
                            qty: 1,
                            itemPrice: PRODUCTS.itemPrice
                        };
                        CART.contents.push(obj);
                        CART.sync();
                            let data = true;
                            return data;
                        
                    
                    }else{
                        console.error('Invalid Product');
                    }
                }
            },
            increase(id, qty=1){
                CART.contents = CART.contents.map(item=>{
                    if(item.id === id)
                        item.qty = item.qty + qty;
                    return item;
                });
                CART.sync()
            },
            reduce(id, qty=1){
                CART.contents = CART.contents.map(item=>{
                    if(item.id === id)
                        item.qty = item.qty - qty;
                    return item;
                });
                CART.contents.forEach(async item=>{
                    if(item.id === id && item.qty === 0)
                        await CART.remove(id);
                });
                CART.sync()
            },
            remove(id){
                CART.contents = CART.contents.filter(item=>{
                    if(item.id !== id)
                        return true;
                });
                CART.sync()
            },
            empty(){
                CART.contents = [];
                CART.sync()
            },
            sort(field='title'){
                let sorted = CART.contents.sort( (a, b)=>{
                    if(a[field] > b[field]){
                        return 1;
                    }else if(a[field] < a[field]){
                        return -1;
                    }else{
                        return 0;
                    }
                });
                return sorted;
                
            },
            logContents(prefix){
                console.log(prefix, CART.contents)
            }
        };
        
        document.addEventListener('DOMContentLoaded', ()=>{
            
            getProducts( showProducts, errorMessage );
            
            CART.init();
            
            showCart();
        });
        
     function showCart(){
        let PRODUCTS = JSON.parse(<?php echo json_encode($formattedData);?>);

        let cartSection = document.getElementById('cart');
        let cartitem = document.createElement('div');
        cart.innerHTML = '';
        let shopcart = document.createElement('h4');
        shopcart.className = 'shopcart';
        shopcart.innerText = "Your Items";
        cartSection.appendChild(shopcart);
        
        
            let form = document.createElement('form');
            form.action = "../Private/tickets.php";
            form.method = "post";
            cartSection.appendChild(form);
        

            let s = CART.sort('qty');
            s.forEach( item =>{
                let cartitem = document.createElement('div');
                cartitem.className = 'cart-item';
                
                let title = document.createElement('h3');
                title.textContent = item.title;
                title.className = 'title';
                cartitem.appendChild(title);

                
                let controls = document.createElement('div');
                controls.className = 'controls';
                cartitem.appendChild(controls);
                
                let plus = document.createElement('span');
                plus.textContent = '+';
                plus.setAttribute('data-id', item.id)
                controls.appendChild(plus);
                plus.addEventListener('click', incrementCart)
                
                let qty = document.createElement('span');
                qty.textContent = item.qty;
                controls.appendChild(qty);
                
                let minus = document.createElement('span');
                minus.textContent = '-';
                minus.setAttribute('data-id', item.id)
                controls.appendChild(minus);
                minus.addEventListener('click', decrementCart)
                
                let price = document.createElement('div');
                price.className = 'price';
                price.textContent = item.itemPrice;
                
                let cost = (item.qty * item.itemPrice);
                price.textContent = cost;
                cartitem.appendChild(price);
                
                cartSection.appendChild(cartitem);
                
                input1 = document.createElement('input');
                input1.type = "hidden";
                input1.name = 'option[' +item.id + ']';
                input1.id = 'itemID';
                input1.value =  item.qty;
                form.appendChild(input1);
              
          
            })
            let button = document.createElement('input');
            button.type = 'submit';
            button.name = 'submit';
            button.value = 'CheckOut';
            button.className = 'checkout';
            form.appendChild(button);
           
        }
        function incrementCart(ev){
            ev.preventDefault();
            let id = parseInt(ev.target.getAttribute('data-id'));
            CART.increase(id, 1);
            let controls = ev.target.parentElement;
            let qty = controls.querySelector('span:nth-child(2)');
            let item = CART.find(id);
            if(item){
                qty.textContent = item.qty;
            }else{
                document.getElementById('cart').removeChild(controls.parentElement);
            }
        }
        
        function decrementCart(ev){
            ev.preventDefault();
            let id = parseInt(ev.target.getAttribute('data-id'));
            CART.reduce(id, 1);
            let controls = ev.target.parentElement;
            let qty = controls.querySelector('span:nth-child(2)');
            let item = CART.find(id);
            if(item){
                qty.textContent = item.qty;
            }else{
                document.
                getElementById('cart').removeChild(controls.parentElement);
            }
        }
        
        function getProducts(success, failure){
            const URL = "data.json";
            fetch(URL, {
                method: 'GET',
                mode: 'cors'
            })
            .then(response=>response.json())
            .then(showProducts)
            .catch(err=>{
                errorMessage(err.message);
            });
        }
        function showProducts( product ){
            
            let PRODUCTS = product;

            let productSection = document.getElementById('products');
            let eventSection = document.getElementById('eventsection');

            productSection.innerHTML = "";
            let card = document.createElement('div');
            card.className = 'card';
            
            let btn = document.createElement('button');
            btn.className = 'addtocart';
            btn.textContent = 'Add to cart';
            btn.setAttribute('data-id', product.id);
            btn.addEventListener('click', addItem);
            eventSection.appendChild(btn);
            productSection.appendChild(card);
            
        }
        
        function addItem(ev){
            ev.preventDefault();
            let id = parseInt(ev.target.getAttribute('data-id'));
            console.log('add to cart item', id);
            CART.add(id, 1);
            showCart();
        }
        
        function errorMessage(err){
            console.error(err);
        }
        
        
        </script>
</html>
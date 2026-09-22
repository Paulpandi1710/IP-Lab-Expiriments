<%@page contentType="text/html" pageEncoding="UTF-8"%> 
<!DOCTYPE html> 
<html> 
<head> 
 <meta charset="UTF-8"> 
 <title>Online Shopping - Place Order</title> 
 <style> 
 * { 
 box-sizing: border-box; 
 margin: 0; 
 padding: 0; 
 font-family: Arial, sans-serif; 
 } 
 body { 
 min-height: 100vh; 
 background: linear-gradient(135deg, #667eea, #764ba2); 
 display: flex; 
 justify-content: center; 
 align-items: center; 
 padding: 30px; 
 } 
 .container { 
 width: 100%; 
 max-width: 600px; 
 background: white; 
 padding: 35px; 
 border-radius: 18px; 
 box-shadow: 0 15px 40px rgba(0,0,0,0.2); 
 } 
 h1 { 
 text-align: center; 
 color: #333333; 
 margin-bottom: 8px; 
 } 
 .subtitle { 
 text-align: center; 
 color: #777; 
 margin-bottom: 28px; 
 } 
 .form-group { 
 margin-bottom: 18px; 
 } 
 label { 
 display: block; 
 margin-bottom: 7px; 
 font-weight: bold; 
 color: #444; 
 } 
 input, 
 textarea { 
 width: 100%; 
 padding: 12px; 
 border: 1px solid #ddd; 
 border-radius: 8px; 
 font-size: 15px; 
 outline: none; 
 } 
 input:focus, 
 textarea:focus { 
 border-color: #667eea; 
 } 
 textarea { 
 height: 90px; 
 resize: none; 
 } 
 .btn { 
 width: 100%; 
 padding: 13px; 
 border: none; 
 border-radius: 8px; 
 background: #667eea; 
 color: white; 
 font-size: 16px; 
 font-weight: bold; 
 cursor: pointer; 
 margin-top: 10px; 
 } 
 .btn:hover { 
 background: #5568d8; 
 } 
 </style> 
</head> 
<body> 
<div class="container"> 
 <h1>Place Your Order</h1> 
 <p class="subtitle"> 
 Enter your order details below 
 </p> 
 <form action="AddOrderServlet" method="post"> 
 <div class="form-group"> 
 <label>Customer Name</label> 
 <input type="text" 
 name="customerName" 
 placeholder="Enter your name" 
 required> 
 </div> 
 <div class="form-group"> 
 <label>Product Name</label> 
 <input type="text" 
 name="productName" 
 placeholder="Enter product name" 
 required> 
 </div> 
 <div class="form-group"> 
 <label>Quantity</label> 
 <input type="number" 
 name="quantity" 
 min="1" 
 placeholder="Enter quantity" 
 required> 
 </div> 
 <div class="form-group"> 
 <label>Price</label> 
 <input type="number" 
 name="price" 
 step="0.01" 
 min="0" 
 placeholder="Enter price" 
 required> 
 </div> 
 <div class="form-group"> 
 <label>Order Date</label> 
 <input type="date" 
 name="orderDate" 
 required> 
 </div> 
 <div class="form-group"> 
 <label>Address</label> 
 <textarea name="address" 
 placeholder="Enter delivery address"></textarea> 
 </div> 
 <button type="submit" class="btn"> 
 Place Order 
 </button> 
 </form> 
</div> 
</body> 
</html>

#databaseSQL

// Requirement
https://docs.google.com/document/d/19J0mVtpp-ti7XD2dhWb6ttPWVcdd5M42ASuN0aTe91U/edit

O = done , X = undone

Basic requirements

X_[A] 
The website has products catalog which categorizes by product vendors and product scale. The catalog is displayed publicly.

X_[B] 
Employees can log-in with a unique employee number and password. Any password in the system mustn’t be stored as plaintext.

X_[C] 
Employees in the sales department, who have “sale” in their job title can access a stock-in system (ระบบรับสินค้าเข้า), which records date, and amount of product in each lot as well as create, update, and delete products.

X_[D] 
When customers buy any product will get 3 member points every $100 spent. The system must show the total points they have and how many points get from each order.

X_[E] 
In this application, employees will place an order for customers by adding products to one order and enter a customer who buys it. Every order will have “in progress” as a default status. If customers have a preferred shipping date, it will set in “required date”. Employees can edit some columns later, which are shipped date, status, and comments.

O_[F] 
Before customers can place an order they need to be a member first. Employees will key customers personal information to the system.

X_[G] 
A payment system is an old school method. After the order was placed, customers will make payments using money cheque. Then, employees will note the payment cheque in a table “payments”. Once a package is ready, the order status will change to “shipped”.

X_[H] 
The order can have six statuses which are: cancelled, disputed (ผู้รับปฏิเสธการรับของ เช่น ของไม่ครบ, เสียหาย, ส่งผิด), in process, on hold, resolved (เคยเกิดปัญหา แต่แก้ไขเรียบร้อยแล้ว), and shipped.

X_[I] 
There is an employee resource management (ERM) feature. This feature allows sales departments to manage their employees. Such as VP sales can promote and demote sales managers from employees. After that, sales managers can promote and demote sales representative respective. 

Special requirements

X_[K] 
Promotion: Discount code (คูปองส่วนลด)

VP marketing can create a discount code as well as a discount amount is, how many times the code can use, and expiry date. For example, a code “XMAS19” will discount $10 from a total amount, can be used 1,000 times, and will expire after December 26, 2019.
The code will use in the ordering process by employees. Then the customers will get a discount that subtracts from the total amount.

X_[L] 
Promotion: Buy one get one (หนึ่งแถมหนึ่ง)

VP marketing can create a buy one get one promotion. The promotion records are consist of product code and expiry date.
Any products in this promotion will get a second for free. However, the promotion can use only time per customer and per product. For example, suppose there is a promotion buy one get one for Product C. Any customer can buy one and get a second for free at a certain time. Nevertheless, any further Product C won’t get a discount and the customer needs to pay a normal price.

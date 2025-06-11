# To-Do List - Shopping cart

## 1. Project Setup [DONE]

-   [x] Install Laravel locally
-   [x] Configure and connect MySQL
-   [x] Setup `.env`
-   [x] Run migration basic migrations
-   [x] Create repo
-   [x] Push first commit

## 2. Table Schemaa

-   [x] Create `cart_items` table
-   [x] Add migration and a seeder

## 3. Routes

-   [x] Route: GET `/cart` → show cart
-   [x] Route: POST `/cart/update/{id}` → update quantity
-   [x] Controller: `CartController`

## 4. Models

-   [x] Setup cart item model and necessary functions

## 5. Controller+view work

-   [x] Load all cart items for the current session
-   [x] Calculate:
    -   [x] Subtotal
    -   [x] GST (5%)
    -   [x] QST (9.975%)
    -   [x] Grand total
-   [x] Update quantity via input field
-   [x] Recalculate totals live on quantity update

## 6. Frontend (HTML/JS/CSS)

-   [x] Simplest cart page layout
-   [x] Quantity update form/button per item
-   [x] Make the cart look decent

## 7. Polish

-   [ ] Page title, simple SEO, Favicon
-   [ ] Change quantity update to look like Amazon's and update it via AJAX
-   [ ] Include delete item when quantity is 1
-   [ ] Make the shopping cart look awesome
-   [ ] Add animation, hover states and small details
-   [ ] Super quick lighthouse improvements (performance + accessibility)
-   [ ] Add installation steps and tools used to `README.md`

## 8. Deploy

-   [ ] Dump database and upload to hosting
-   [ ] Upload files to hosting
-   [ ] Add details to `.env` file

## 9. Test

-   [ ] Test live page on PC browser
-   [ ] Test live page on iPhone

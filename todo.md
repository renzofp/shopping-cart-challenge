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
-   [x] Update quantity via buttons click
-   [x] Recalculate totals live on quantity update

## 6. Frontend (HTML/JS/CSS)

-   [x] Simplest cart page layout
-   [x] Quantity update form/button per item
-   [x] Make the cart look decent

## 7. Polish functionality

-   [ ] Page title, simple SEO, Favicon
-   [ ] Add image field to cart_items table
-   [x] Change quantity update to look like Amazon's
-   [ ] Make quantity update without a page reload
-   [ ] Disallow users to spam click change quantity until the change is applied
-   [ ] Include a delete item button at the bottom of each card

## 8. Make it look awesome

-   [x] Make a globals css file and import it on app.css
-   [x] Use headlines and update fontsizes
-   [ ] Add animation, hover states and small details
-   [ ] Super quick lighthouse improvements (performance + accessibility)
-   [x] Add installation steps and tools used to `README.md`
-   [ ] Document code

## 8. Deploy

-   [ ] Dump database and upload to hosting
-   [ ] Upload files to hosting
-   [ ] Add details to `.env` file

## 9. Test

-   [ ] Test live page on PC browser
-   [ ] Test live page on iPhone

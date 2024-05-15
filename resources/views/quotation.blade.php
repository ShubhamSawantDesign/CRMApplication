<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Price Quotation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    :root {
      --yellow: #fdc800;
      --gray: #716f6e;
    }

    .bg-yellow {
      background-color: #fdc800;
    }

    .bg-grey {
      background-color: #716f6e;
    }

    .bg-light-yellow {
      background-color: #FFFFED;
    }

    body,
    h3 {
      font-family: "Poppins", sans-serif;
    }

    .header-table {
      width: 100%;
    }

    .logo-container {
      text-align: right;
    }

    .logo_ics {
      width: 150px;
      box-shadow: 0 0 10px #dcdcdc;
    }

    .text-right {
      text-align: right;
    }

    .font-14 {
      font-size: 13px;
    }

    .line-height-3 {
      line-height: 1.3;
    }

    .add-para {
      letter-spacing: 0.7;
    }

    .quotation-text {
      font-size: 25px;
      letter-spacing: 1.5;
      color: #fdc800;
    }

    .company-name {
      font-size: 15px;
      font-weight: 400;
      font-family: "Poppins", sans-serif;
    }

    .w-60 {
      width: 70%;
    }

    .quot-details {
      line-height: 0;
    }

    .text-justify {
      text-align: justify;
    }

    .header,
    footer {
      width: 100%;
      text-align: center;
      position: fixed;
    }

    footer {
      bottom: -30px;
      border-top: 2px solid #fdc800;
    }

    @page {
      size: a4 landscape;
      margin-bottom: 50px;
    }

    .page-break {
      page-break-after: always;
    }

    .line-height-0 {
      line-height: 0;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid lightgray;
    }
  </style>
</head>

<body>

  <header>

  </header>
  <footer>
    <p class="mb-0">Integrated Consultancy Services</p>
    <p class="mb-0 font-14">"Rajbharati", 367, Uday Society, Shakar Nagar - I, Pune, Maharashtra - 411 009
    </p>
  </footer>

  <main>
    <table class="header-table">
      <tr>
        <th class="logo-container">
          <img src="{{ public_path('assets/img/') }}ics_logo.png" class="logo_ics">
        </th>
      </tr>
    </table>
    <div class="text-end text-capitalize  line-height-3 mt-2 add-para">
      <p class="font-14 mb-0">Integrated Consultancy services</p>
      <p class="font-14  mb-0">"Rajbharati", 367, Uday Society,</p>
      <p class="font-14  mb-0">Shakar Nagar - I, Pune,</p>
      <p class="font-14  mb-0">Maharashtra - 411 009</p>
      <p class="font-14  mb-0">Tel No : 020 - 2421 8410</p>
      <p class="font-14  mb-0">Fax No : XXXX XXXXX XXX</p>
      <p class="font-14  mb-0">GSTIN No : XXXX XXXXX XXX</p>
    </div>
    <div class="text-end line-height-3">
      <a href="https://icspune.com/" target="_blank">
        <p class="font-14  mb-0"> https://icspune.com/</p>
      </a>
    </div>

    <div class="containter-fluid">
      <p class="text-uppercase quotation-text mb-0">Quotation</p>
      <p class="company-name mt-3 fw-bold">Company Name</p>
    </div>
    <div class="container-fluid">
      <table class="w-100">
        <tr>
          <th class="w-60">
            <p class="font-14 fw-bold mb-0">Dear Sir/Madam,</p>
          </th>
          <td rowspan="4" class="bg-light">
            <table class="w-100 quot-details px-2">

              <tr>
                <td>
                  <p class="font-14 text-end">Quotation #:</p>
                </td>
                <td>
                  <p class="font-14 text-end">ICS/QT/2024/01</p>
                </td>
                <td>

                </td>
              </tr>

              <tr>
                <td>
                  <p class="font-14 text-end">Expiration Date:</p>
                </td>
                <td>
                  <p class="font-14 text-end">14/06/2024</p>
                </td>
              </tr>

              <tr>
                <td>
                  <p class="font-14 text-end">Creation Date:</p>
                </td>
                <td>
                  <p class="font-14 text-end">14/05/2024</p>
                </td>
              </tr>

              <tr>
                <td>
                  <p class="font-14 text-end">Prepared By:</p>
                </td>
                <td>
                  <p class="font-14 text-end">Name Of Person

                  </p>
                </td>
              </tr>

              <tr>
                <td></td>
                <td>
                  <p class="font-14 text-end">employee@email.com</p>
                </td>
              </tr>

              <tr>
                <td>
                  <p class="font-14 text-end">Payment Terms:</p>
                </td>
                <td>
                  <p class="font-14 text-end">Payment In Advance</p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <p class="font-14">Thank you for your enquiry. We are pleased to provide you with this quote</p>
          </td>
        </tr>
        <tr>
          <td class="text-justify">
            <p class="font-14 pe-3">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores incidunt laudantium quis distinctio autem, velit exercitationem necessitatibus. Vero pariatur accusamus deserunt rem. Dolorum eaque nisi nemo reprehenderit itaque deserunt ratione!
            </p>
          </td>
        </tr>
      </table>

      <!-- Page 1 Ends Here -->

      <div class="page-break"></div>

      <section id="page-2">
        <table class="w-100">
          <tr>
            <td rowspan="6" class="w-25 bg-yellow px-2 text-center" align="center">
              <p class="mb-0 font-14">Quated for:</p>
            </td>
            <td class="bg-light">
              <p class=" px-2 mb-0 font-14">Name Of the Company</p>
            </td>
          </tr>
          <tr>
            <td class="bg-light-yellow">
              <p class=" px-2  mb-0 font-14">Address Line 1</p>
            </td>
          </tr>
          <tr>
            <td class="bg-light">
              <p class="px-2 mb-0 font-14">Address Line 2</p>
            </td>
          </tr>
          <tr>
            <td class="bg-light-yellow">
              <p class=" px-2 mb-0 font-14">City</p>
            </td>
          </tr>
          <tr>
            <td class="bg-light">
              <p class=" px-2 mb-0 font-14">State and pincode</p>
            </td>
          </tr>
          <tr>
            <td class="bg-light-yellow">
              <p class=" px-2 mb-0 font-14">Country</p>
            </td>
          </tr>
        </table>

        <table style="width: 100%;" class="mt-3">
          <tr>
            <th style="width: 50%;">APAC General</th>
            <td style="width: 50%;" class="text-end">Currency: INR</td>
          </tr>
        </table>

        <table style="width: 100%;" class="mt-3 table-bordered">

          <thead>
            <tr>
              <th colspan="9" class="bg-secondary text-white px-2 font-14">Perpetual</th>
            </tr>
            <tr>
              <th class="px-2 font-14" align="center">S.No</th>
              <th class="px-2 font-14">Product No.</th>
              <th class="px-2 font-14">Description</th>
              <th class="px-2 font-14">Qty.</th>
              <th class="px-2 font-14">Unit Price</th>
              <th class="px-2 font-14">Sub Total</th>
              <th class="px-2 font-14">GST Rate</th>
              <th class="px-2 font-14">GST Amt.</th>
              <th class="px-2 font-14">Total</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="p-2 font-14 text-center"> 1 </td>
              <td class="p-2 font-14"> PRD-2024-0011 </td>
              <td class="p-2 font-14" style="width: 13%;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
              <td class="p-2 font-14">20</td>
              <td class="p-2 font-14">2,000.00/-</td>
              <td class="p-2 font-14">40,000.00/-</td>
              <td class="p-2 font-14">ICGST 18%</td>
              <td class="p-2 font-14">7,200.00/-</td>
              <td class="p-2 font-14">47,200.00/-</td>
            </tr>
            <tr>
              <td class="p-2 font-14 text-center"> 1 </td>
              <td class="p-2 font-14"> PRD-2024-0011 </td>
              <td class="p-2 font-14" style="width: 13%;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
              <td class="p-2 font-14">20</td>
              <td class="p-2 font-14">2,000.00/-</td>
              <td class="p-2 font-14">40,000.00/-</td>
              <td class="p-2 font-14">ICGST 18%</td>
              <td class="p-2 font-14">7,200.00/-</td>
              <td class="p-2 font-14">47,200.00/-</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td class="p-2 font-14"></td>
              <td class="p-2 font-14"></td>
              <td class="p-2 font-14"></td>
              <td class="p-2 font-14"></td>

              <td class="p-2 font-14 text-end fw-bold" colspan="2">80,000.00/-
              </td>
              <td class="p-2 font-14 text-end fw-bold" colspan="2">14,400.00/-
              </td>
              <td class="p-2 font-14 text-end fw-bold">94,400.00/-
              </td>
            </tr>
          </tfoot>


        </table>


<!-- 
        <table style="width: 100%;" class="mt-3 table-bordered">

          <thead>
            <tr>
              <th colspan="8" class="bg-secondary text-white px-2 font-14">Term Subscription</th>
            </tr>
            <tr>
              <th class="px-2 font-14" align="center">S.No</th>
              <th class="px-2 font-14">Product No.</th>
              <th class="px-2 font-14">Description</th>
              <th class="px-2 font-14">Qty.</th>
              <th class="px-2 font-14">Unit Price</th>
              <th class="px-2 font-14">Ext. Price</th>
              <th class="px-2 font-14">Tax Rate</th>
              <th class="px-2 font-14">Tax Amt.</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="p-2 font-14 text-center"> 1 </td>
              <td class="p-2 font-14"> PRD-2024-0011 </td>
              <td class="p-2 font-14" style="width: 13%;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
              <td class="p-2 font-14">20</td>
              <td class="p-2 font-14">2,000.00/-</td>
              <td class="p-2 font-14">40,000.00/-</td>
              <td class="p-2 font-14">ICGST 18%</td>
              <td class="p-2 font-14">7,200.00/-</td>
            </tr>
            <tr>
              <td class="p-2 font-14 text-center"> 1 </td>
              <td class="p-2 font-14"> PRD-2024-0011 </td>
              <td class="p-2 font-14" style="width: 13%;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
              <td class="p-2 font-14">20</td>
              <td class="p-2 font-14">2,000.00/-</td>
              <td class="p-2 font-14">40,000.00/-</td>
              <td class="p-2 font-14">ICGST 18%</td>
              <td class="p-2 font-14">7,200.00/-</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td class="p-2 font-14"></td>
              <td class="p-2 font-14"></td>
              <td class="p-2 font-14"></td>
              <td class="p-2 font-14 text-end fw-bold" colspan="3">80,000.00/-
                <br>
                Eighty Thousands only.
              </td>
              <td class="p-2 font-14 text-end fw-bold" colspan="2">14,400.00/-
                <br>
                Fourteen Thousands Only.
              </td>
            </tr>
          </tfoot>
        </table> -->


        <table class="mt-4  w-100">
          <tbody class="bg-light ">
            <tr>
              <td class="font-14 px-2" style="width: 75%;">General Total</td>
              <td class="font-14 text-end" style="width: 25%;">Resell Ext.</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
            <tr>
              <td class="font-14 px-2" style="width: 75%;"></td>
              <td class="font-14 text-end" style="width: 25%;">Price</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
            <tr>
              <td class="font-14 px-2" style="width: 75%;"></td>
              <td class="font-14 text-end" style="width: 25%;">1,00,000.00/-</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
            <tr>
              <td class="font-14 px-2" style="width: 75%;"></td>
              <td class="font-14 text-end" style="width: 25%;">INR</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
          </tbody>

          <tfoot class="bg-grey" style="line-height: 2;">
            <tr>
              <td class="font-14 px-2 text-white" style="width: 75%;">CIF</td>
              <td class="font-14 text-end text-white" style="width: 25%;">0.00 INR</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
            <tr>
              <td class="font-14 px-2 text-white" style="width: 75%;">Total State GST</td>
              <td class="font-14 text-end text-white" style="width: 25%;">0.00 INR</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
            <tr>
              <td class="font-14 px-2 text-white" style="width: 75%;">Total Central GST</td>
              <td class="font-14 text-end text-white" style="width: 25%;">0.00 INR</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
            <tr>
              <td class="font-14 px-2 text-white" style="width: 75%;">Total GST ( Fourteen Thousands & Four Hundred Only )</td>
              <td class="font-14 text-end text-white" style="width: 25%;">14,400.00 INR</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
            <tr>
              <td class="font-14 px-2 text-white" style="width: 75%;">Total ( Ninty Four Thousands & Four Hundred Only )</td>
              <td class="font-14 text-end text-white" style="width: 25%;">94,400.00 INR</td>
              <td class="font-14 text-end" style="width: 25%;">&nbsp;</td>
            </tr>
          </tfoot>
        </table>
      </section>

      <!-- Page 2 Ends Here -->

      <div class="page-break"></div>

      <section id="page-3">
        <div class="terms-condition">
          <p class="font-14 fw-bold">Terms & Condition</p>

          <p class="font-14 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum deserunt rerum nulla a voluptatum est architecto, quisquam consequuntur consequatur non incidunt nam deleniti quos, repellat aperiam perspiciatis dolores fuga magni?</p>
          <p class="font-14">View at: <a href="https://icspune.com/">https://icspune.com/</a></p>
        </div>
      </section>

  </main>
</body>

</html>
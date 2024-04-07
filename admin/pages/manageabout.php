<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');
?>
 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card ">
                <h5 class="card-header">Table Basic</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Image</th>
                        <th>Sub-title</th>
                        <th>Detail</th>
                        <th>Birthday</th>
                        <th>Website</th>
                        <th>Phone no.</th>
                        <th>City</th>
                        <th>Degree</th>
                        <th>Email</th>
                        <th>Freelance</th>
                        <th>Content</th>
                        <th>action</th>
                        
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 " >
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong></strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
 </div>
<?php
require('../inc/footer.php')
?>